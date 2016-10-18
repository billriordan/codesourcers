<?php

namespace App\Http\Middleware;

use Closure;

class CheckConfirmation
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
        if($request->confirmed != 1) { //handle if user is confirmed
            flash('Account is not confirmed, please verify your email.', 'danger');
            return redirect('/'); //base page
        }
        return $next($request);
    }
}
