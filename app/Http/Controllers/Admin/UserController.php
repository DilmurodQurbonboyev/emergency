<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Authority;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('view', auth()->user());
        $users = User::query()
            ->findOrFail($id);
        return view('admin.users.show', compact('users'));
    }

    public function edit($id)
    {
        $users = User::query()->findOrFail($id);
        $authorities = Authority::query()->get();
        return view('admin.users.edit', compact('users', 'authorities'));
    }

    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $user->userRoleLink()->sync($request->authority_id, $user->id);
        $user->save();

        return redirect()
            ->route('users.show', $id)
            ->with('success_save', 'Successfully saved');
    }

    public function destroy($id)
    {
        User::query()
            ->findOrFail($id)
            ->delete();
        return redirect()
            ->route('users.index');
    }
}
