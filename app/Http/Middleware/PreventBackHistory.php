<?php

namespace App\Http\Middleware;

//use Closure;
//use Illuminate\Http\Request;
//
//class PreventBackHistory
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
//     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//     */
//    public function handle(Request $request, Closure $next)
//    {
//        $response = $next($request);
//        return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
//            ->header('Pragma','no-cache')
//            ->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
//    }
//}
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Check if the response is not an instance of BinaryFileResponse
        if (!$response instanceof BinaryFileResponse) {
            // Apply headers for non-binary responses
            $response->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
        }

        return $response;
    }
}
