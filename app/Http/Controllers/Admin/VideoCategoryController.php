<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListCategoryRequest;
use App\Interfaces\ListCategoryRepositoryInterface;
use App\Models\ListCategory;
use App\Models\User;
use Exception;

class VideoCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepositoryInterface $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.videos.videos-category.index');
    }

    public function create()
    {
        $videosCategory = new ListCategory();
        $videosCategories = ListCategory::query()
            ->where('list_type_id', ListType::VIDEO)
            ->where('status', 2)
            ->get();
        return view('admin.videos.videos-category.create', compact('videosCategories', 'videosCategory'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository
                ->saveCategory($request, $listCategory);
            return redirect()
                ->route('videos-category.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $videosCategory = $this->listCategoryRepository
            ->getById($id);
        return view('admin.videos.videos-category.show', compact('videosCategory'));
    }

    public function edit($id)
    {
        $videosCategory = $this->listCategoryRepository
            ->getById($id);
        $videosCategories = ListCategory::query()
            ->where('list_type_id', ListType::VIDEO)
            ->where('status', 2)
            ->get();
        return view('admin.videos.videos-category.edit', compact('videosCategory', 'videosCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository
                ->updateCategory($request, $id);
            return redirect()
                ->route('videos-category.show', $id)
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
                ->route('videos-category.index', $id);
        } catch (Exception $error) {
            return redirect()
                ->route('videos-category.index', $id)
                ->with('success', tr('Something went wrong'));
        }
    }

    public function trashes()
    {
        $users = User::all();
        $videos = ListCategory::onlyTrashed()
            ->where('list_type_id', ListType::VIDEO)
            ->paginate(10);
        return view('admin.videos.videos-category.trashes', compact('videos', 'users'));
    }

    public function restore($id)
    {
        ListCategory::withTrashed()
            ->findOrFail($id)
            ->restore();
        return redirect()
            ->back();
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
