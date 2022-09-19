<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ListType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListCategoryRequest;
use App\Interfaces\ManagementCategoryRepositoryInterface;
use App\Models\MCategory;
use Exception;

class ManagementCategoryController extends Controller
{
    private $managementCategoryRepository;

    function __construct(ManagementCategoryRepositoryInterface $managementCategoryRepository)
    {
        $this->managementCategoryRepository = $managementCategoryRepository;
    }

    public function index()
    {
        return view('admin.managements.managements-category.index');
    }

    public function create()
    {
        $managementCategory = new MCategory();
        $managementCategories = MCategory::query()
            ->where('status', 2)
            ->get();
        return view('admin.managements.managements-category.create', compact('managementCategories', 'managementCategory'));
    }

    public function store(ListCategoryRequest $request, MCategory $mCategory)
    {
        try {
            $this->managementCategoryRepository
                ->saveManagementCategory($request, $mCategory);
            return redirect()
                ->route('managements-category.index')
                ->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $managementCategory = $this->managementCategoryRepository
            ->getById($id);
        return view('admin.managements.managements-category.show', compact('managementCategory'));
    }

    public function edit($id)
    {
        $managementCategory = $this->managementCategoryRepository
            ->getById($id);
        $managementCategories = MCategory::query()
            ->where('list_type_id', ListType::MANAGEMENT)
            ->where('status', 2)
            ->get();
        return view('admin.managements.managements-category.edit', compact('managementCategory', 'managementCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->managementCategoryRepository
                ->updateManagementCategory($request, $id);
            return redirect()
                ->route('managements-category.show', $id)
                ->with('success_update', tr('Successfully updated'));
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', trans('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->managementCategoryRepository
                ->deleteManagementCategory($id);
            return redirect()
                ->route('managements-category.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', trans('Something went wrong'));
        }
    }
}
