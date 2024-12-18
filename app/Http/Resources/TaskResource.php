<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'title' =>$this->title,
            'description'=>$this->description,
            'status_id'=>$this->status_id,
            'user_took_id'=>$this->user_took_id,
            'date_start'=>Carbon::parse($this->date_start)->format("d.m.Y H:i"),
            'date_end'=>Carbon::parse($this->date_end)->format("d.m.Y H:i"),
            'user_info'=>$this->user,
            'status_title'=>$this->status,
            'user_took_info'=>$this->user_took_info


        ];
    }
}
