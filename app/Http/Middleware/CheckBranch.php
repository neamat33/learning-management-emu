<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBranch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = auth()->user();
        if(auth()->user()->hasAnyRole('admin')||auth()->user()->hasAnyRole('test_admin')){
             //dd(session('test'));
            if(session('branch_id')==null){
                session(['branch_id'=>1]);
                session(['role_id'=>1]);
                //session()->flash('success','Default Branch Selected!');
            }
        }else{
            // set user branch
            // dd("HERE");
            if(session('branch_id')==null){
                session(['branch_id'=>$user->branch_id]);
            }
        }
        // dd("HERE");
        return $next($request);
    }
}
