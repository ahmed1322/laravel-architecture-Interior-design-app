<?php

namespace App\Http\Middleware\Dashboard;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check Can access dashboard
        if( ! auth()->user()->canAccessDashboard() ) abort(403);

        return $next($request);
    }
}
