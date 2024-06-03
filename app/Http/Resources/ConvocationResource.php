<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConvocationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $date_time = Carbon::create($this->date_time);

        return [
            'name' => $this->name,
            'location' => $this->location,
            'description' => $this->description,
            'slug' => $this->slug,
            'image' => $this->image,
            'date' => $date_time->isoFormat('LL'),
            'time' => $date_time->isoFormat('h:mm'),
            'created_at_for_humans' => $this->created_at->diffForHumans()
        ];
    }
}
