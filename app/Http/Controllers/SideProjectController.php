<?php

namespace App\Http\Controllers;

use App\Http\Transformers\SideProjectTransformer;
use App\Models\SideProject;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Knuckles\Scribe\Attributes\ResponseFromFile;

/**
 * @group Side Projects
 *
 * APIs for managing side projects.
 *
 * Note how the URL params for the endpoints here are automatically generated by Scribe.
 */
class SideProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    /**
     * View all side projects
     *
     * This endpoint's response was gotten via a "response call"—
     * Scribe called our API in a test environment to get a sample response.
     */
    public function index()
    {
        return SideProject::all();
    }

    /**
     * Start a new side project
     *
     * _Even though we both know you'll never finish it._
     *
     * This endpoint's body parameters were automatically generated by Scribe
     * from the controller's code. Check out the source! </aside>
     *
     * @authenticated
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // The name of your side project. Example: The SideProject API
            'name' => 'string|max:80|required',
            // A longer description of your side project.
            'description' => 'string|max:255',
            // A url to your side project.
            'url' => 'string|url',
            // Due date for the side project.
            'due_at' => ['date', 'date_format:Ymd', 'after:today'],
        ]);

        $validated['user_id'] = auth()->id();

        return SideProject::create($validated);
    }

    /**
     * View a side project
     *
     * This endpoint's response uses a Fractal transformer, so we tell Scribe that using an annotation,
     * and it figures out how to generate a sample. The 404 sample is gotten from a "response file".
     *
     * <aside class="success">Also, pretty cool: this endpoint's (and many others') URL parameters were figured out entirely by Scribe!</aside>
     *
     * @transformer App\Http\Transformers\SideProjectTransformer
     * @transformerModel App\Models\SideProject with=owner
     * @responseFile 404 scenario="Side project not found" responses/not_found.json {"resource": "Side project"}
     */
    public function show(SideProject $id)
    {
        $fractal = new Manager();
        $resource = new Item($sideProject, new SideProjectTransformer());
        return $fractal->createData($resource)->toArray();
    }

    /**
     * Update a side project
     *
     */
    public function update(Request $request, SideProject $sideProject)
    {
        //
    }

    /**
     * Delete a side project
     *
     * @response 204 scenario="Nothing to see here"
     *
     */
    public function destroy(SideProject $sideProject)
    {
        //
    }

    /**
     * Finish a side project
     *
     * Will you ever?🤔
     */
    #[ResponseFromFile("responses/not_found.json", status: 404, merge: ["resource" => "Side project"],
        description: "Side project not found")]
    public function finish(SideProject $sideProject)
    {
        //
    }
}
