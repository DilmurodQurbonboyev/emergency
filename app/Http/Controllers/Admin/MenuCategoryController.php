<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\MenusCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenusCategoryRequest;
use App\Interfaces\MenusCategoryRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MenuCategoryController extends Controller
{
    private $menuCategoryRepository;

    public function __construct(MenusCategoryRepositoryInterface $menuCategoryRepository)
    {
        $this->menuCategoryRepository = $menuCategoryRepository;
    }

    public function index()
    {
        return view('admin.menus.menus-category.index');
    }


    public function create()
    {
        $menusCategory = new MenusCategory();
        return view('admin.menus.menus-category.create', compact('menusCategory'));
    }

    public function store(MenusCategoryRequest $request)
    {
        try {
            $this->menuCategoryRepository->saveCategory($request);
            return redirect()
                ->route('menus-category.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('warning', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $menusCategory = $this->menuCategoryRepository->getById($id);
        return view('admin.menus.menus-category.show', compact('menusCategory'));
    }

    public function edit($id)
    {
        $menusCategory = $this->menuCategoryRepository->getById($id);
        return view('admin.menus.menus-category.edit', compact('menusCategory'));
    }

    public function update(MenusCategoryRequest $request, $id)
    {
        try {
            $this->menuCategoryRepository->updateCategory($request, $id);
            return redirect()
                ->route('menus-category.show', $id)
                ->with('success_update', tr('Successfully updated'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('warning', tr('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->menuCategoryRepository->deleteCategory($id);
            return redirect()
                ->route('menus-category.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('warning', tr('Something went wrong'));
        }
    }

    public function trashes()
    {
        $users = User::all();
        $menusCategory = MenusCategory::onlyTrashed()
            ->paginate(10);
        return view('admin.menus.menus-category.trashes', compact('menusCategory', 'users'));
    }

    public function restore($id)
    {
        MenusCategory::withTrashed()
            ->findOrFail($id)
            ->restore();
        return redirect()
            ->route('menus-category.trashes');
    }

    public function forceDelete($id)
    {
        MenusCategory::onlyTrashed()
            ->findOrFail($id)
            ->forceDelete();
        return redirect()
            ->back();
    }

    public function json($id)
    {
        $data = MenusCategory::query()->findOrFail($id);

        $fileName = "$id.json";
        $fileStorePath = public_path($fileName);
        \File::put($fileStorePath, $data);
        return response()->download($fileStorePath)->deleteFileAfterSend(true);
    }
}
