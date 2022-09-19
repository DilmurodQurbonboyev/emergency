<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\MenusCategoryResource;
use App\Interfaces\MenusCategoryRepositoryInterface;
use App\Models\MenusCategory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MenuCategoryController extends Controller
{
    private $menuCategoryRepository;

    public function __construct(MenusCategoryRepositoryInterface $menuCategoryRepository)
    {
        $this->menuCategoryRepository = $menuCategoryRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $paginate = $request->query('paginate') ? $request->query('paginate') : 12;
        $lang = $request->query('lang') ? $request->query('lang') : 'oz';

        $data = MenusCategory::query()
            ->join('menus_category_translations', 'menus_categories.id', '=', 'menus_category_translations.menus_category_id')
            ->where('menus_category_translations.locale', $lang)
            ->paginate($paginate);

        return MenusCategoryResource::collection($data);
    }

    public function store(Request $request)
    {
        try {
            $data = $this->menuCategoryRepository->saveCategory($request);
            return new MenusCategoryResource($data);
        } catch (Exception $error) {
            return response()->json([
                "error" => [
                    'error' => $error->getMessage(),
                    'code' => $error->getCode()
                ]
            ]);
        }
    }

    public function show($id, Request $request): MenusCategoryResource
    {
        $lang = $request->query('lang') ? $request->query('lang') : 'oz';

        $data = MenusCategory::query()
            ->find($id)
            ->join('menus_category_translations', 'menus_categories.id', '=', 'menus_category_translations.menus_category_id')
            ->where('menus_category_translations.locale', $lang)
            ->first();

        return new MenusCategoryResource($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $this->menuCategoryRepository->updateCategory($request, $id);
            return new MenusCategoryResource($data);
        } catch (Exception $error) {
            return response()->json([
                "error" => [
                    'error' => $error->getMessage(),
                    'code' => $error->getCode()
                ]
            ]);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->menuCategoryRepository->deleteCategory($id);
            return response()->json([
                "success" => [
                    'message' => "Successfully deleted!",
                ]
            ]);
        } catch (Exception $error) {
            return response()->json([
                "error" => [
                    'error' => $error->getMessage(),
                    'code' => $error->getCode()
                ]
            ]);
        }
    }
}
