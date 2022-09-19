<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListCategoryRequest;
use App\Interfaces\ListCategoryRepositoryInterface;
use App\Models\ListCategory;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class PageCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepositoryInterface $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.pages.pages-category.index');
    }

    public function create()
    {
        $pagesCategory = new ListCategory();
        $pagesCategories = ListCategory::query()
            ->where('list_type_id', ListType::PAGE)
            ->where('status', 2)
            ->get();
        return view('admin.pages.pages-category.create', compact('pagesCategories', 'pagesCategory'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository
                ->saveCategory($request, $listCategory);
            return redirect()
                ->route('pages-category.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $pagesCategory = $this->listCategoryRepository
            ->getById($id);
        return view('admin.pages.pages-category.show', compact('pagesCategory'));
    }

    public function edit($id)
    {
        $pagesCategory = $this->listCategoryRepository
            ->getById($id);
        $pagesCategories = ListCategory::query()
            ->where('list_type_id', ListType::PAGE)
            ->where('status', 2)
            ->get();
        return view('admin.pages.pages-category.edit', compact('pagesCategory', 'pagesCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository
                ->updateCategory($request, $id);
            return redirect()
                ->route('pages-category.show', $id)
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
                ->route('pages-category.index', $id);
        } catch (Exception $error) {
            return redirect()
                ->route('pages-category.index', $id)
                ->with('success', trans('admin.error_save'));
        }
    }

    public function trashes()
    {
        $users = User::all();
        $pages = ListCategory::onlyTrashed()
            ->where('list_type_id', ListType::PAGE)
            ->paginate(10);
        return view('admin.pages.pages-category.trashes', compact('pages', 'users'));
    }

    public function restore($id)
    {
        ListCategory::withTrashed()
            ->findOrFail($id)
            ->restore();
        return redirect()
            ->route('pages-category.trashes');
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
