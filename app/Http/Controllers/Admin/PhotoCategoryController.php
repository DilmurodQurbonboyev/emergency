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

class PhotoCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepositoryInterface $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.photos.photos-category.index');
    }

    public function create()
    {
        $photosCategory = new ListCategory();
        $photosCategories = ListCategory::query()
            ->where('list_type_id', ListType::PHOTO)
            ->where('status', 2)
            ->get();
        return view('admin.photos.photos-category.create', compact('photosCategories', 'photosCategory'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory): RedirectResponse
    {
        try {
            $this->listCategoryRepository
                ->saveCategory($request, $listCategory);
            return redirect()
                ->route('photos-category.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $photosCategory = $this->listCategoryRepository
            ->getById($id);
        return view('admin.photos.photos-category.show', compact('photosCategory'));
    }

    public function edit($id)
    {
        $photosCategory = $this->listCategoryRepository
            ->getById($id);
        $photosCategories = ListCategory::query()
            ->where('list_type_id', ListType::PHOTO)
            ->where('status', 2)
            ->get();
        return view('admin.photos.photos-category.edit', compact('photosCategory', 'photosCategories'));
    }

    public function update(ListCategoryRequest $request, $id): RedirectResponse
    {
        try {
            $this->listCategoryRepository
                ->updateCategory($request, $id);
            return redirect()
                ->route('photos-category.show', $id)
                ->with('success_update', tr('Successfully updated'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $this->listCategoryRepository
                ->deleteCategory($id);
            return redirect()
                ->route('photos-category.index', $id);
        } catch (Exception $error) {
            return redirect()
                ->route('photos-category.index', $id)
                ->with('success', tr('Something went wrong'));
        }
    }

    public function trashes()
    {
        $users = User::all();
        $photos = ListCategory::onlyTrashed()
            ->where('list_type_id', ListType::PHOTO)
            ->paginate(10);
        return view('admin.photos.photos-category.trashes', compact('photos', 'users'));
    }

    public function restore($id): RedirectResponse
    {
        ListCategory::withTrashed()
            ->findOrFail($id)
            ->restore();
        return redirect()
            ->route('photos-category.trashes');
    }

    public function forceDelete($id): RedirectResponse
    {
        ListCategory::onlyTrashed()
            ->findOrFail($id)
            ->forceDelete();
        return redirect()
            ->back();
    }
}
