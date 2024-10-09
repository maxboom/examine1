<?php

namespace App\Http\Middleware;

use App\Models\Link;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LinkMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $link = Link::findBySegment($request->segment);

        if (!$link) {
            return redirect(route('login'));
        }

        return $next($request);
    }
}
