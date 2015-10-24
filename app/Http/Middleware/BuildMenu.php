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
            if(Auth::check()) {
                if(Auth::user()->isHost()) {
                    $menu->add('Meine Anzeigen', 'host/offers')->active('host/offers/*');
                    $menu->add('Mein Profil', 'host/profile');
                } else {
                    $menu->add('Mein Profil', 'refugee/profile');
                }
            }
            $menu->add('Über', 'about');
        });

        if(Auth::check()) {
            Menu::make('rightmenu', function ($menu) {
                $menu->add('Logout', 'auth/logout');
            });
        } else {
            Menu::make('rightmenu', function ($menu) {
                $menu->add('Login', 'auth/login');
                $menu->add('Registrieren Flüchtling', 'auth/register/refugee');
                $menu->add('Registrieren Anbieter', 'auth/register/host');
            });
        }

        return $next($request);
    }
}
