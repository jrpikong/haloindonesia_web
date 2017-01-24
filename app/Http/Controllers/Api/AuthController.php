<?php

namespace App\Http\Controllers\Api;

use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request, User $user){
        $this->validate($request,[
            'name'       => 'required',
            'email'      => 'required|email|unique:users',
            'password'  => 'required:min8',
        ]);

        $user = $user->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'api_token' => bcrypt($request->email),
            'avatar'    => 'users/default.png',
            'role_id'   => 2
        ]);
        $return = fractal()
            ->item($user)
            ->transformWith(new UserTransformer())
            ->addMeta([
                'token' => $user->api_token
            ])
            ->toArray();

        return response()->json($return,201);
    }

    public function login(Request $request,User $user){
        if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return response()->json(["error"=>'Your Credential Is Wrong'], 401);
        }

        $user = $user->find(Auth::user()->id);

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer())
            ->addMeta([
                'token' => $user->api_token
            ])
            ->toArray();
    }
}
