<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Traits\ResponseMessage;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogin
{
    use ResponseMessage;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user_id = $request->header('Current_User');
            Auth::login(User::findOrFail($user_id));

            return $next($request);
        }catch (\Exception $exception){
            return $this->returnMessage('User not found', false, 422);
        }

    }
}
