<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class VerfiyCategoryCount
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
        if (Category::all()->count()==0){
            session()->flash('error','First you need to add Category First');
            return redirect()->route('categories.create');

        }
        return $next($request);
    }
}
