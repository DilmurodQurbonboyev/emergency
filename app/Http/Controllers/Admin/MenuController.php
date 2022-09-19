<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Interfaces\MenuRepositoryInterface;
use App\Models\Menu;
use App\Models\MenusCategory;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MenuController extends Controller
{
    private $menuRepository;

    function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        return view('admin.menus.menus.index');
    }

    public function create()
    {
        $parents = Menu::query()->get();
        $menu = new Menu();
        $menusCategories = MenusCategory::query()->get();
        return view('admin.menus.menus.create', compact([
            'parents', 'menusCategories', 'menu'
        ]));
    }

    public function store(MenuRequest $request): RedirectResponse
    {
        try {
            $this->menuRepository->saveMenu($request);
            return redirect()
                ->route('menus.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('warning', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $menu = $this->menuRepository->getById($id);
        return view('admin.menus.menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $parents = Menu::all();
        $menusCategories = MenusCategory::query()
            ->get();
        $menu = $this->menuRepository->getById($id);
        return view('admin.menus.menus.edit', compact('menu', 'parents', 'menusCategories'));
    }

    public function update(MenuRequest $request, $id)
    {
        try {
            $this->menuRepository->updateMenu($request, $id);
            return redirect()
                ->route('menus.show', $id)
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
            $this->menuRepository->deleteMenu($id);
            return redirect()
                ->route('menus.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('warning', tr('Something went wrong'));
        }
    }

    public function trashes()
    {
        $users = User::all();
        $menus = Menu::onlyTrashed()
            ->paginate(10);
        return view('admin.menus.menus.trashes', compact('menus', 'users'));
    }

    public function restore($id)
    {
        Menu::withTrashed()
            ->findOrFail($id)
            ->restore();
        return redirect()
            ->route('menus.trashes');
    }

    public function forceDelete($id)
    {
        Menu::onlyTrashed()
            ->findOrFail($id)
            ->forceDelete();
        return redirect()
            ->back();
    }
}
