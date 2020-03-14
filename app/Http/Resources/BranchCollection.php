<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\RoomCollection;

class BranchCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->branch_name,
            'address' => $this->address,
            'work_from' => $this->word_from,
            'work_to' => $this->work_to,
            'rooms' => new RoomCollection($this->load('rooms')),
        ];
    }
}
