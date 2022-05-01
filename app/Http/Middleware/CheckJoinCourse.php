<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckJoinCourse
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
        if (Auth::user()->getCourseUser($request['course_id']) > 0) {
            return redirect()->back()->with('joincourse', 'Bạn đã join khóa học!');
        }

        return $next($request);
    }
}
