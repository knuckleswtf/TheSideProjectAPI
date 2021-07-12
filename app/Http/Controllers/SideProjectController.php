<?php

namespace App\Http\Controllers;

use App\Http\Transformers\SideProjectTransformer;
use App\Models\SideProject;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;


class SideProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index()
    {
        return SideProject::all();
    }

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

    public function show(SideProject $sideProject)
    {
        $fractal = new Manager();
        $resource = new Item($sideProject, new SideProjectTransformer());
        return $fractal->createData($resource)->toArray();
    }

    public function update(Request $request, SideProject $sideProject)
    {
        //
    }

    public function destroy(SideProject $sideProject)
    {
        //
    }

    public function finish(SideProject $sideProject)
    {
        //
    }
}
