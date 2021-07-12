<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Tests\TestCase;

/**
 * @group Users
 */
class UserControllerTest extends TestCase
{
    /**
     * View all users
     *
     * This endpoint uses a custom Scribe strategy that parses a
     * `@usesPagination` annotation to add some query parameters.
     *
     * The sample response is gotten by Scribe making a test API call (aka "response call").
     *
     * @queryParam sort string Field to sort by. Defaults to 'id'.
     * @usesPagination
     */
    public function test_users_index()
    {
        $response = $this->get('api/users');

        $response->assertOk();
    }

    /**
     * Create a user
     *
     * This endpoint's body parameters are automatically generated from a FormRequest.
     *
     * @bodyParam name string required The name of the user.
     * @bodyParam email string required The email of the user.
     */
    public function test_users_store()
    {
        $data = User::factory()->make()->toArray()+['password' => 'as123as35y'];

        $response = $this->post('api/users', $data);

        $response
        ->assertCreated();
    }

    /**
     * Authenticate
     *
     * Get a new API token.
     *
     * <aside>Yes, we know you can impersonate any user.🙄</aside>
     *
     * @response {"token": "2|KLDoUXc68Ko0JaFDZoX9qYkUqWglwdGxQsvTGBCg"}
     * @responseField token The new API token. Valid forever.
     */
    public function test_users_authenticate()
    {
        $user = User::factory()->create();

        $response = $this->post("api/users/{$user->id}/auth");

        $response
        ->assertOk()
        ->assertJsonStructure([
            'token',
        ]);
    }

    /**
     * Fetch a user
     *
     * This endpoint's response uses an Eloquent API resource, so we tell Scribe that using an annotation,
     * and it figures out how to generate a sample. The 404 sample is gotten from a "response file".
     *
     * @apiResource App\Http\Resources\UserResource
     * @apiResourceModel App\Models\User with=sideProjects
     * @responseFile 404 scenario="User not found" responses/not_found.json {"resource": "user"}
     */
    public function test_users_show()
    {
        $user = User::factory()->create();

        $response = $this->get("api/users/{$user->id}");

        $response
        ->assertOk();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test_users_update()
    {
        $this->assertTrue(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test_users_destroy()
    {
        $this->assertTrue(true);
    }
}
