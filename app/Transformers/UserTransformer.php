<?php
/**
 * Created by PhpStorm.
 * User: jrpikong
 * Date: 24/01/17
 * Time: 13:55
 */

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user){
        return [
            'name' => $user->name,
            'email' => $user->email,
            'registered'        => $user->created_at->diffForHumans(),
        ];
    }
}