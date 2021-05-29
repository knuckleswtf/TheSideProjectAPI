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
    /**
     * View all users.
     *
     * This endpoint uses a custom Scribe strategy that parses a
     * `@usesPaginationParameters` annotation.
     *
     * @usesPaginationParameters
     */
    public function index()
    {
        //
    }

    /**
     * Create a user
     *
     * This endpoint's body parameters are automatically generated from a FormRequest.
     */
    public function store(CreateUserRequest $request)
    {
        /** @var User $user */
        $user = User::create($request->validated());
        $token = $user->createToken('default');
        return ['user' => $user, 'token' => $token->plainTextToken];
    }

    /**
     * Fetch a user
     *
     */
    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
