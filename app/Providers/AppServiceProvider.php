<?php

namespace App\Providers;

use App\Events\Task\TaskCreated;
use App\Listeners\Task\CreateJobDisabledTask;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Domain\Orders\Events\PodcastProcessed;
use App\Domain\Orders\Listeners\SendPodcastNotification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Event::listen( Event::listen(TaskCreated::class,
            CreateJobDisabledTask::class));
    }

}
