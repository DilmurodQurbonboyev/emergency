<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function menus(Request $request): JsonResponse
    {
        $top_menu = Menu::query()
            ->join('menu_translations', 'menus.id', '=', 'menu_translations.menu_id')
            ->where('menu_translations.title', '!=', null)
            ->where('menu_translations.locale', '=', $request->query('lang'))
            ->select([
                'menus.id',
                'menus.link',
                'menus.link_type',
                'menus.parent_id',
                'menu_translations.title'
            ])
            ->where('menus.menus_category_id', 1)
            ->where('menus.status', 2)
            ->with(
                [
                    'translations' => function ($query) use ($request) {
                        $query->where('locale', $request->query('lang'));
                    }
                ]
            )
            ->orderBy('menus.order')
            ->orderBy('menus.id')
            ->get();

        $top_menu_tree = Menu::buildTree($top_menu->toArray());

        return response()->json($top_menu_tree);
    }
}
