<?php

namespace App\Http\Middleware;

use Closure;
use App\Clickdumy;
use Illuminate\Support\Facades\Auth;

class AccessPosts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->guest()) {
            return redirect()->guest('login');
        }
        else {
            $post_ids = Clickdumy::where('url', $request->route('url'))->get();
            foreach( $post_ids as $post_id ) {
                if ( $post_id->user_id != Auth::user()->id ) {
                    \Session::flash('mesasadge','You CD not access');
                    return redirect('/');
                }
            }
        }
        return $next($request);
    }
}
