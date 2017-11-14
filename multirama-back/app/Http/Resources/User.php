<?php
/**
 * Created by PhpStorm.
 * User: Adham
 * Date: 14/11/2017
 * Time: 13:10
 */

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}