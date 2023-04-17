<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Article\Constants\MenuConstants;

class ActiveMenu
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path = parse_url(url()->previous());
        $dataUrl = isset($path['path']) ? $path['path'] : '';
        $menu = explode('/', $dataUrl);
        if (isset($menu[2]) || isset($menu[3])) {
            if ($menu[2] == MenuConstants::MENU_SERVICES_SLUG ||
                $menu[2] == MenuConstants::MENU_INDUSTRIES_SLUG) {
                Session::put('menu_parent', $menu[2]);
                Session::put('menu_child', $menu[3]);
            } elseif($menu[2] == MenuConstants::MENU_TECHNOLOGIES_SLUG) {
                Session::put('menu_parent', $menu[2]);
            }
        } else {
            Session::forget('menu_parent');
            Session::forget('menu_child');
        }
        return $next($request);
    }

}

