<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class Admin
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
    if (auth()->user()->role_id != Role::where('name', 'admin')->first()->id) {
      return redirect()->route('animal-index')->with('error', 'Permiso denegado');
    }

    return $next($request);
  }
}
