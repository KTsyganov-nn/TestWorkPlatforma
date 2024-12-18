<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusTask extends Model
{
    protected $guarded = false;

    function Tasks()
    {
        return $this->hasMany(Task::class);
    }
}
