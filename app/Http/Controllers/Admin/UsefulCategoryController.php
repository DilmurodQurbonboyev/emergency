<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListCategoryRequest;
use App\Interfaces\ListCategoryRepositoryInterface;
use App\Models\ListCategory;
use App\Models\User;
use Exception;

class UsefulCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepositoryInterface $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.usefuls.usefuls-category.index');
    }

    public function create()
    {
        $usefulCategory = new ListCategory();
        $usefulCategories = ListCategory::query()
            ->where('list_type_id', ListType::USEFUL)
            ->where('status', 2)
            ->get();
        return view('admin.usefuls.usefuls-category.create', compact('usefulCategories', 'usefulCategory'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('useful-category.index')->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $usefulCategory = $this->listCategoryRepository
            ->getById($id);
        return view('admin.usefuls.usefuls-category.show', compact('usefulCategory'));
    }

    public function edit($id)
    {
        $usefulCategory = $this->listCategoryRepository
            ->getById($id);
        $usefulCategories = ListCategory::query()
            ->where('list_type_id', ListType::USEFUL)
            ->where('status', 2)
            ->get();
        return view('admin.usefuls.usefuls-category.edit', compact('usefulCategory', 'usefulCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository
                ->updateCategory($request, $id);
            return redirect()
                ->route('useful-category.show', $id)
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
                ->route('useful-category.index', $id);
        } catch (Exception $error) {
            return redirect()
                ->route('useful-category.index', $id)
                ->with('error', tr('Something wrong'));
        }
    }

    public function trashes()
    {
        $users = User::all();
        $usefuls = ListCategory::onlyTrashed()
            ->where('list_type_id', ListType::USEFUL)
            ->paginate(10);
        return view('admin.usefuls.usefuls-category.trashes', compact('usefuls', 'users'));
    }

    public function restore($id)
    {
        ListCategory::withTrashed()
            ->findOrFail($id)
            ->restore();
        return redirect()
            ->route('useful-category.trashes');
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
