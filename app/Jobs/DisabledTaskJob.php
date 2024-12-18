<?php

namespace App\Jobs;

use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DisabledTaskJob implements ShouldQueue
{
    use Queueable, InteractsWithQueue, Queueable, SerializesModels;
    protected $task_id;

    /**
     * Create a new job instance.
     */
    public function __construct($id)
    {
        $this->task_id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Task::disabledTask(Task::find($this->task_id));
    }
}
