<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::paginate());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique',
            'password' => 'required'
        ]);
    }
}
