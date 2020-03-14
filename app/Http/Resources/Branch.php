<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Room as RoomResource;
use App\Http\Resources\RoomCollection;

class Branch extends JsonResource
{
    /**
     * Transform the resource into an array.
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
            'work_from' => $this->work_from,
            'work_to' => $this->work_to,
            'rooms' => new RoomCollection($this->rooms),
        ];
    }
}
