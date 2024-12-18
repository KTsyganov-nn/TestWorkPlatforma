<?php

namespace App\Listeners\Task;

use App\Events\TaskCreated;
use App\Jobs\DisabledTaskJob;
use Illuminate\Support\Carbon;


class CreateJobDisabledTask
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {

        DisabledTaskJob::dispatch($event->task->id)
            ->delay(Carbon::parse($event->task->date_end)
                ->setTimezone('Europe/Moscow'));
    }
}
