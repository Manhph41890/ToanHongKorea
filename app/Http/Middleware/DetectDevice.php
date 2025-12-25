<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class DetectDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $agent = new Agent();

        // Mặc định giả định là Desktop
        $isMobile = false;

        if (!$request->is('admin*')) {
            // Kiểm tra xem là Mobile thật hoặc đang dùng mode dev=mobile
            if (($agent->isMobile() && !$agent->isTablet()) || ($request->dev == 'mobile')) {
                $isMobile = true;
                view()->getFinder()->prependLocation(resource_path('views/client/mobile'));
            } else {
                view()->getFinder()->prependLocation(resource_path('views/client/desktop'));
            }
        }

        // CHIA SẺ BIẾN NÀY VỚI TẤT CẢ FILE BLADE
        view()->share('isMobile', $isMobile);

        return $next($request);
    }
}
