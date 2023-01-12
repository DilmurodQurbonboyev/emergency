<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListCategoryRequest;
use App\Interfaces\ListCategoryRepositoryInterface;
use App\Models\ListCategory;
use App\Models\User;
use Exception;

class LinkCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepositoryInterface $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.links.links-category.index');
    }

    public function create()
    {
        $linkCategory = new ListCategory();
        $linkCategories = ListCategory::query()
            ->where('list_type_id', ListType::LINKS)
            ->where('status', 2)
            ->get();
        return view('admin.links.links-category.create', compact('linkCategories', 'linkCategory'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('links-category.index')->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $linkCategory = $this->listCategoryRepository
            ->getById($id);
        return view('admin.links.links-category.show', compact('linkCategory'));
    }

    public function edit($id)
    {
        $linkCategory = $this->listCategoryRepository
            ->getById($id);
        $linkCategories = ListCategory::query()
            ->where('list_type_id', ListType::LINKS)
            ->where('status', 2)
            ->get();
        return view('admin.links.links-category.edit', compact('linkCategory', 'linkCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository
                ->updateCategory($request, $id);
            return redirect()
                ->route('links-category.show', $id)
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
            $this->listCategoryRepository
                ->deleteCategory($id);
            return redirect()
                ->route('links-category.index', $id);
        } catch (Exception $error) {
            return redirect()
                ->route('links-category.index', $id)
                ->with('error', tr('Something wrong'));
        }
    }

    public function trashes()
    {
        $users = User::all();
        $usefuls = ListCategory::onlyTrashed()
            ->where('list_type_id', ListType::USEFUL)
            ->paginate(10);
        return view('admin.links.links-category.trashes', compact('usefuls', 'users'));
    }

    public function restore($id)
    {
        ListCategory::withTrashed()
            ->findOrFail($id)
            ->restore();
        return redirect()
            ->route('links-category.trashes');
    }

    public function forceDelete($id)
    {
        ListCategory::onlyTrashed()
            ->findOrFail($id)
            ->forceDelete();
        return redirect()
            ->back();
    }
}
