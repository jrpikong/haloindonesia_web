<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;

use App\User;
use App\Transformers\UserTransformer;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function users(User $user){
        $users = $user->all();

        return fractal()
            ->collection($users)
            ->transformWith(new UserTransformer())
            ->toArray();
    }
}
