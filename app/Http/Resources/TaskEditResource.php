<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class TaskEditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'status_id' => $this->status_id,
            'user_took_id' => $this->user_took_id,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'user_info' => $this->user,
            'status_title' => $this->status,
            'user_took_info' => $this->user_took_info
        ];

    }
}
