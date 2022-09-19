<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Helpers\ListType;
use App\Models\ListCategory;
use App\Services\MessageService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\ListCategoryRequest;
use Illuminate\Contracts\Foundation\Application;
use App\Interfaces\ListCategoryRepositoryInterface;


class NewsCategoryController extends Controller
{
    private $listCategoryRepository;

    public function __construct(ListCategoryRepositoryInterface $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.news.news-category.index');
    }

    public function create()
    {
        $newsCategory = new ListCategory();
        $newsCategories = ListCategory::query()
            ->where('list_type_id', ListType::NEWS)
            ->where('status', 2)
            ->get();
        return view('admin.news.news-category.create', compact('newsCategories', 'newsCategory'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository
                ->saveCategory($request, $listCategory);
            return redirect()
                ->route('news-category.index')
                ->with('success_save', MessageService::tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', MessageService::tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $newsCategory = $this->listCategoryRepository
            ->getById($id);
        return view('admin.news.news-category.show', compact('newsCategory'));
    }

    public function edit($id)
    {
        $newsCategory = $this->listCategoryRepository
            ->getById($id);
        $newsCategories = ListCategory::query()
            ->where('list_type_id', ListType::NEWS)
            ->where('status', 2)
            ->get();
        return view('admin.news.news-category.edit', compact('newsCategory', 'newsCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository
                ->updateCategory($request, $id);
            return redirect()
                ->route('news-category.show', $id)
                ->with('success_update', MessageService::tr('Successfully updated'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', MessageService::tr('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository
                ->deleteCategory($id);
            return redirect()
                ->route('news-category.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function trashes()
    {
        $users = User::all();
        $news = ListCategory::onlyTrashed()
            ->where('list_type_id', ListType::NEWS)
            ->paginate(10);
        return view('admin.news.news-category.trashes', compact('news', 'users'));
    }

    public function restore($id)
    {
        ListCategory::withTrashed()
            ->findOrFail($id)
            ->restore();
        return redirect()
            ->route('news-category.trashes');
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
