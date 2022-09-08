<?php

namespace App\Http\Controllers;

use Knuckles\Scribe\Attributes\Response;
use Knuckles\Scribe\Attributes\ResponseField;
use Knuckles\Scribe\Attributes\ResponseFromApiResource;
use Knuckles\Scribe\Attributes\ResponseFromFile;
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
     * View all users
     *
     * This endpoint uses a custom Scribe strategy that parses a
     * `@usesPagination` annotation to add some query parameters.
     *
     * The sample response is gotten by Scribe making a test API call (aka "response call").
     *
     * @usesPagination
     */
    public function index()
    {
        return UserResource::collection(User::all());
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
     * Authenticate
     *
     * Get a new API token.
     *
     * <aside>Yes, we know you can impersonate any user.🙄</aside>
     */
    #[Response('{"token": "2|KLDoUXc68Ko0JaFDZoX9qYkUqWglwdGxQsvTGBCg"}')]
    #[ResponseField('token', description: 'The new API token. Valid forever.')]
    public function authenticate($id)
    {
        $token = User::findOrFail($id)->createToken('default');
        return ['token' => $token->plainTextToken];
    }

    /**
     * Fetch a user
     *
     * This endpoint's response uses an Eloquent API resource, so we tell Scribe that using an annotation,
     * and it figures out how to generate a sample. The 404 sample is gotten from a "response file".
     */
    #[ResponseFromApiResource(UserResource::class, User::class, with: ['sideProjects'])]
    #[ResponseFromFile('responses/not_found.json', 404, merge: '{"resource": "user"}',
        description: '404, User not found')]
    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }
}
