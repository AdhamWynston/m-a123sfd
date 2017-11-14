<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Transformer\UserTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return  UserResource::collection($users);
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
