<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProofUploadMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::user()->status == '2') {
            $flg = 'danger';
            $msg = 'first upload payment proof';
            $request->session()->flash($flg, $msg);
            return redirect(route('proof_payment'));
        }
        return $next($request);
    }

}
