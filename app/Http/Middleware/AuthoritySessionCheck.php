<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AuthLog;

class AuthoritySessionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (count(auth()->user()->userRoleLink) > 1) {
            if (!session()->get('current_authority')) {
                return redirect()->route('getRole');
            } else {
                return $next($request);
            }
        } elseif (count(auth()->user()->userRoleLink) == 1) {
            session()->put('current_authority', auth()->user()->userRoleLink->first());
            session()->put('current_user', auth()->user());
            AuthLog::query()->create([
                'authority_id' => session()->get('current_authority')->id,
                'user_id' => auth()->user()->id,
                'description' => 'authenticated via oneid',
            ]);
            return $next($request);
        } elseif (count(auth()->user()->userRoleLink) == 0) {
            return abort(403);
        } else {
            return $next($request);
        }
    }
}
