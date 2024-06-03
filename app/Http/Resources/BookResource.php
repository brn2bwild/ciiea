<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'authors' => $this->authors,
            'isbn' => $this->isbn,
            'publicated_at' => $this->publicated_at,
            'slug' => $this->slug,
            'created_at' => Carbon::createFromDate($this->publicated_at)->isoFormat('LL'),
            'file' => $this->file,
        ];
    }
}
