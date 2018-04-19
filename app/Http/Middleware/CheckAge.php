<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::info('Showing user profile for user: ');
        Log::info($request);
        Log::info($request->age);
        Log::alert($request->age);
        if ($request->age <= 200) {
            return redirect('home');
        }
        return $next($request);
    }
}
