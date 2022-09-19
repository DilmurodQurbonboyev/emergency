<?php

namespace App\Http\Controllers\Admin;


use App\Models\AuthLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalMenus = DB::table('menus')->select(DB::raw("SUM(CASE WHEN status = '2' THEN 1 ELSE 0 END) AS menus"))->first();
        $totalUsers = DB::table('users')->select(DB::raw("COUNT('*') AS users"))->first();
        $totalManagements = DB::table('management')->select(DB::raw("SUM(CASE WHEN status = '2' THEN 1 ELSE 0 END) AS managements"))->first();

        $totalLists = DB::table('lists')
            ->select([
                DB::raw("SUM(CASE WHEN list_type_id = '1' THEN 1 ELSE 0 END) AS news"),
                DB::raw("SUM(CASE WHEN list_type_id = '4' THEN 1 ELSE 0 END) AS links"),
                DB::raw("SUM(CASE WHEN list_type_id = '5' THEN 1 ELSE 0 END) AS pages"),
                DB::raw("SUM(CASE WHEN list_type_id = '6' THEN 1 ELSE 0 END) AS usefuls"),
                DB::raw("SUM(CASE WHEN list_type_id = '7' THEN 1 ELSE 0 END) AS photos"),
                DB::raw("SUM(CASE WHEN list_type_id = '8' THEN 1 ELSE 0 END) AS videos"),
            ])->first();

        return view('admin.index', compact([
            'totalLists',
            'totalMenus',
            'totalUsers',
            'totalManagements'
        ]));
    }

    public function getRole()
    {
        $authorities = auth()->user()->userRoleLink;
        return view('admin.roles', compact('authorities'));
    }

    public function setRole(Request $request): RedirectResponse
    {
        foreach (auth()->user()->userRoleLink as $data) {
            if ($data->id == $request->authority_id) {
                session()->put('current_authority', $data);
                session()->put('current_user', auth()->user());

                AuthLog::query()->create([
                    'authority_id' => session()->get('current_authority')->id,
                    'user_id' => auth()->user()->id,
                    'description' => 'authenticated via oneid',
                    'user_ip' => $request->ip(),
                ]);
            }
        }
        return redirect()->route('admin.dashboard');
    }

    public function changeRole(Request $request)
    {
        $request->session()->forget('current_authority');
        $request->session()->forget('current_user');
        return redirect()->route('getRole');
    }
}
