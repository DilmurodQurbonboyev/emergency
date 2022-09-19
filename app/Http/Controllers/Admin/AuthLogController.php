<?php

namespace App\Http\Controllers\Admin;

use App\Models\AuthLog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthLogController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        $logs = AuthLog::query()
            ->with([
                'users.userData',
                'authorities.translations'
            ])
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('admin.authentication-logs.index', compact('logs', 'users'));
    }

    public function show($id)
    {
        $logs = AuthLog::query()->findOrFail($id);
        return view('admin.authentication-logs.show', compact('logs'));
    }
}
