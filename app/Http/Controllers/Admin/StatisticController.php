<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Region;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->select('id')
            ->with('translations')
            ->get()
            ->toArray();

        $regions = Region::query()
            ->select('id', 'name_oz', 'name_uz', 'name_ru')
            ->whereNull('parent_id')
            ->get()
            ->toArray();

        $taskMoney = Task::query()
            ->where('status', 4)
            ->select(
                [
                    'id',
                    'money',
                    'category_id',
                    'province_id'
                ]
            )
            ->get()
            ->toArray();

        $taskOverall = Task::query()
            ->where('status', 4)
            ->select(
                [
                    'category_id',
                    'province_id'
                ]
            )
            ->get()
            ->groupBy('province_id')
            ->toArray();


//        $tasks = Task::query()
//            ->where('status', 4)
//            ->with('provinces')
//            ->get(['id', 'province_id', 'category_id'])
//            ->groupBy('province_id', 'category_id');


        return view('admin.statistics.index', compact(
            [
                'categories',
                'regions',
            ]
        ));
    }
}
