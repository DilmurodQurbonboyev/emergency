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

class UsefulController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepositoryInterface $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.usefuls.usefuls.index');
    }

    public function create()
    {
        $usefuls = new Lists();
        $usefulCategories = ListCategory::query()
            ->where('list_type_id', ListType::USEFUL)
            ->get();
        return view('admin.usefuls.usefuls.create', compact('usefulCategories', 'usefuls'));
    }

    public function store(ListsLinkRequest $request, Lists $lists): RedirectResponse
    {
        try {
            $this->listsRepository
                ->saveList($request, $lists);
            return redirect()
                ->route('useful.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $usefuls = $this->listsRepository
            ->getById($id);
        return view('admin.usefuls.usefuls.show', compact('usefuls'));
    }

    public function edit($id)
    {
        $usefuls = $this->listsRepository
            ->getById($id);
        $usefulCategories = ListCategory::query()
            ->where('list_type_id', ListType::USEFUL)
            ->get();
        return view('admin.usefuls.usefuls.edit', compact('usefuls', 'usefulCategories'));
    }

    public function update(ListsLinkRequest $request, $id)
    {
        try {
            $this->listsRepository
                ->updateList($request, $id);
            return redirect()
                ->route('useful.show', $id)
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
                ->route('useful.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }
}
