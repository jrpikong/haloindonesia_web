<?php
/**
 * Created by PhpStorm.
 * User: jrpikong
 * Date: 24/01/17
 * Time: 15:22
 */

namespace App\Transformers;

use App\Opinion;
use League\Fractal\TransformerAbstract;

class OpinionTransformers extends TransformerAbstract
{
    public function transform(Opinion $opinion)
    {
        return [
            'id'                => $opinion->id,
            'users_id'          => $opinion->users_id,
            'hashtag'           => $opinion->hashtag,
            'message'           => $opinion->message,
            'registered'        => $opinion->created_at->diffForHumans(),
        ];
    }
}