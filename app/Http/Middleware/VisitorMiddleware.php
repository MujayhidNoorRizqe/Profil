<?php

// app/Http/Middleware/VisitorMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorMiddleware {
    public function handle(Request $request, Closure $next) {
        Visitor::firstOrCreate(['ip_address' => $request->ip()]);
        return $next($request);
    }
}
