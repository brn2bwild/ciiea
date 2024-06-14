<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvestigationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'publicated_at' => $this->publicated_at,
            'short_description' => $this->short_description,
            'slug' => $this->slug,
            'file' => $this->file
        ];
    }
}
