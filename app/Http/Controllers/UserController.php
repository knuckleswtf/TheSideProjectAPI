<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Users
 */
class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(CreateUserRequest $request)
    {
        /** @var User $user */
        $user = User::create($request->validated());
        $token = $user->createToken('default');
        return response(['user' => $user, 'token' => $token->plainTextToken], 201);
    }

    public function authenticate($id)
    {
        $token = User::findOrFail($id)->createToken('default');
        return ['token' => $token->plainTextToken];
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
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
