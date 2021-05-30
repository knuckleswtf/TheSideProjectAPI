<?php


namespace App\Http\Transformers;


use App\Models\SideProject;
use League\Fractal\TransformerAbstract;

class SideProjectTransformer extends TransformerAbstract
{
    public function transform(SideProject $sideProject)
    {
        return [
            'name' => $sideProject->name,
            'description' => $sideProject->description,
            'due_date' => $sideProject->due_at,
            'owner' => $sideProject->owner,
        ];
    }
}
