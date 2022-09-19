<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteLog;
use App\Models\User;
use Stevebauman\Location\Facades\Location;

class LogController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        $logs = SiteLog::query()->orderByDesc('id')->paginate(20);
        return view('admin.logs.index', compact([
            'users',
            'logs'
        ]));
    }

    public function show($id)
    {

        $log = SiteLog::query()
            ->findOrFail($id);
        $position = Location::get(ip2long($log->user_ip));
        return view('admin.logs.show', compact('log', 'position'));
    }
}
