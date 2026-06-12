<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Added this import

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        // Check if the user is logged in AND their role is 'admin'
        if ($user && $user->isAdmin()) {
            // Allow the request to proceed
            return $next($request);
        }

        // If they are a 'viewer' or not logged in, deny access with a 403 error
        abort(403, 'Unauthorized action. Only admins can access this area.');
    }
}
