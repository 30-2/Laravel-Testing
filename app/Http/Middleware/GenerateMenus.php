<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
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
        \Menu::make('MyNavBar', function ($menu) {

            
            $menu->add('Home');
            $menu->home->add('Who are we?', 'who-we-are');
            $menu->home->add('What we do?', 'what-we-do');
              $menu->group(['style' => 'padding: 0', 'data-role' => 'navigation'], function($m){
            
                    $m->add('About',  'about');
                    $m->add('services', ['action' => 'CatController@index']);
              });
            
              $menu->add('Contact',  'contact');
        });
        return $next($request);
    }
}
