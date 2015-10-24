<?php

namespace App\Http\Middleware;

use Menu;
use Auth;
use Closure;

class BuildMenu
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
        Menu::make('leftmenu', function ($menu) {
            $menu->add('Startseite', '');
            $menu->add('Über', 'about');
        });

        if(Auth::check()) {
            Menu::make('rightmenu', function ($menu) {
                $menu->add('Logout', 'auth/logout');
            });
        } else {
            Menu::make('rightmenu', function ($menu) {
                $menu->add('Login', 'auth/login');
                $menu->add('Registrieren', 'auth/register')->active('auth/register/*');
            });
        }

        return $next($request);
    }
}
