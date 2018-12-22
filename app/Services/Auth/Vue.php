<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2018/12/12
 * Time: 10:29 AM
 */

namespace App\Services\Auth;


use App\Contracts\JwtAuthContract;
use App\Http\Resources\UserResource;

class Vue implements JwtAuthContract
{
    use Respond;

    public function login()
    {
        $credentials = request(['username', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return api()->errorUnauthorized();
        }

        return api()->created('login success')->setMeta($this->respondWithToken($token));
    }

    public function refresh()
    {
        // TODO: Implement refresh() method.
    }

    public function logout()
    {
        // TODO: Implement logout() method.
        auth()->logout();
        return api()->accepted();
    }

    public function info()
    {
        return api()->item(auth()->user(), UserResource::class);
    }
}