<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RevalidateBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     $response = $next($request);
    //     return $response->header('Cache-Control','nocache,no-store,max-age=0;must-revalidate')
    //         ->header('Pragma','no-cache')
    //         ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
    // }
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Set the "Expires" header to -1 to prevent caching of the page
        $response->header('Expires', '-1');
        $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');

        // Set the "Pragma" header to prevent caching in some versions of Internet Explorer
        $response->header('Pragma', 'no-cache');

        return $response;
    }
}
