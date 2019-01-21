<?php
namespace App\Http\Middleware;
use Closure;
class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $userRole = $request->user()->role;
        
        if ($userRole === $role) {
            return $next($request);
        }else{
            return redirect()->back();
        }
        
    }
}