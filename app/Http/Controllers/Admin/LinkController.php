<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListsLinkRequest;
use App\Interfaces\ListsRepositoryInterface;
use App\Models\ListCategory;
use App\Models\Lists;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepositoryInterface $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.links.links.index');
    }

    public function create()
    {
        $links = new Lists();
        $linkCategories = ListCategory::query()
            ->where('list_type_id', ListType::LINKS)
            ->get();
        return view('admin.links.links.create', compact('linkCategories', 'links'));
    }

    public function store(ListsLinkRequest $request, Lists $lists): RedirectResponse
    {
        try {
            $this->listsRepository
                ->saveList($request, $lists);
            return redirect()
                ->route('links.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $links = $this->listsRepository
            ->getById($id);
        return view('admin.links.links.show', compact('links'));
    }

    public function edit($id)
    {
        $links = $this->listsRepository
            ->getById($id);
        $linkCategories = ListCategory::query()
            ->where('list_type_id', ListType::LINKS)
            ->get();
        return view('admin.links.links.edit', compact('links', 'linkCategories'));
    }

    public function update(ListsLinkRequest $request, $id)
    {
        try {
            $this->listsRepository
                ->updateList($request, $id);
            return redirect()
                ->route('links.show', $id)
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
                ->route('links.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }
}
