<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
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
        $userRole = Auth::user()->role;
        
        if ($userRole === $role) {
            return $next($request);
        }else{
            return redirect()->back()->with('feedback', 'Erro: Você não tem permissão para isso');
        }
        
    }
}