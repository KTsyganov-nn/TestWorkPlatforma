<?php

namespace App\Models;

use App\Events\Task\TaskCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected static function booted()
    {

        static::created(function ($task) {
            event(new TaskCreated($task));
        });
    }

    public function status()
    {
        return $this->belongsTo(StatusTask::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_took_info()
    {
        return $this->belongsTo(User::class, 'user_took_id', 'id');
    }

    public static function disabledTask(Task $task)
    {
        $date_in_bd = Carbon::parse($task->date_end);
        $server_data = Carbon::now();
        if ($date_in_bd <= $server_data) {
            $task->update(['status_id' => 6]);
        }
        return true;

    }
}
