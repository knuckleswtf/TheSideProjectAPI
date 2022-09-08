<?php

namespace App\Http\Controllers;

use Knuckles\Scribe\Attributes\Response;

class CRUDController extends Controller
{
    /**
     * Delete an entity
     *
     */
    #[Response(status: 204, description: '204, Nothing to see here')]
    public function destroy($id)
    {
        //
    }
}
