<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class CheckApiTokenByAdelV2
{
    public function handle(Request $request, Closure $next)
    {
        $api_token = $request->get('token');
        $accessToken = PersonalAccessToken::findToken($api_token);

        if (!$accessToken) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid token',
            ]);
        }

        $user = $accessToken->tokenable;
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ]);
        }

        // Pass the user ID to the request for later use
        $request->merge(['user_id' => $user->id]);

        return $next($request);
    }
}
