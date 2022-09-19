<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListsRequest;
use App\Interfaces\ListsRepositoryInterface;
use App\Models\ListCategory;
use App\Models\Lists;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class PageController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepositoryInterface $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.pages.pages.index');
    }

    public function create()
    {
        $pages = new Lists();
        $pagesCategories = ListCategory::query()
            ->where('list_type_id', ListType::PAGE)
            ->get();
        return view('admin.pages.pages.create', compact('pagesCategories', 'pages'));
    }

    public function store(ListsRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository
                ->saveList($request, $lists);
            return redirect()
                ->route('pages.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $pages = $this->listsRepository
            ->getById($id);
        return view('admin.pages.pages.show', compact('pages'));
    }

    public function edit($id)
    {
        $pages = $this->listsRepository
            ->getById($id);
        $pagesCategories = ListCategory::query()
            ->where('list_type_id', ListType::PAGE)
            ->get();
        return view('admin.pages.pages.edit', compact('pages', 'pagesCategories'));
    }

    public function update(ListsRequest $request, $id)
    {
        try {
            $this->listsRepository
                ->updateList($request, $id);
            return redirect()
                ->route('pages.show', $id)
                ->with('success_update', tr('Successfully updated'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository
                ->deleteList($id);
            return redirect()
                ->route('pages.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }
}
