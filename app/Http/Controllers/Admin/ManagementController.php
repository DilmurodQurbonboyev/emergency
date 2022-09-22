<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementRequest;
use App\Interfaces\ManagementRepositoryInterface;
use App\Models\Management;
use App\Models\MCategory;
use App\Models\Region;
use Exception;

class ManagementController extends Controller
{
    private $managementRepository;

    public function __construct(ManagementRepositoryInterface $managementRepository)
    {
        $this->managementRepository = $managementRepository;
    }

    public function index()
    {
        $managements = Management::query()
            ->where('list_type_id', 10)
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('admin.managements.managements.index', compact('managements'));
    }

    public function create()
    {
        $management = new Management();
        $regions = Region::query()
            ->whereNull('parent_id')
            ->get(
                [
                    'id',
                    'name_oz',
                    'name_uz',
                    'name_ru'
                ]
            );
        $managementCategories = MCategory::query()
            ->where('status', 2)
            ->get();
        return view('admin.managements.managements.create', compact([
            'managementCategories',
            'management',
            'regions'
        ]));
    }

    public function store(ManagementRequest $request)
    {
        try {
            $this->managementRepository
                ->saveManagement($request);
            return redirect()
                ->route('managements.index')->with('success_save', tr('Successfully saved'));
        } catch (Exception $error) {
            dd($error);
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $management = $this->managementRepository
            ->getById($id);
        return view('admin.managements.managements.show', compact('management'));
    }

    public function edit($id)
    {
        $management = $this->managementRepository
            ->getById($id);
        $regions = Region::query()
            ->whereNull('parent_id')
            ->get(
                [
                    'id',
                    'name_oz',
                    'name_uz',
                    'name_ru'
                ]
            );
        $managementCategories = MCategory::query()
            ->where('status', 2)
            ->get();
        return view('admin.managements.managements.edit', compact([
            'management',
            'managementCategories',
            'regions'
        ]));
    }

    public function update(ManagementRequest $request, $id)
    {
        try {
            $this->managementRepository
                ->updateManagement($request, $id);
            return redirect()
                ->route('managements.show', $id)
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
            $this->managementRepository
                ->deleteManagement($id);
            return redirect()
                ->route('managements.index');
        } catch (Exception $error) {
            return redirect()
                ->back()
                ->with('error', tr('Something went wrong'));
        }
    }
}
