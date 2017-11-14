<?php
/**
 * Created by PhpStorm.
 * User: Adham
 * Date: 14/11/2017
 * Time: 12:41
 */

namespace App\Transformer;


use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    function transform(User $user){
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->status,
            'role' => $user->role,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ];
    }

}