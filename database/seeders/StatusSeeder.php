<?php

namespace Database\Seeders;

use App\Models\StatusTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusTask::create(['title'=>'Активна']);
        StatusTask::create(['title'=>'В работе']);
        StatusTask::create(['title'=>'Завершена']);
        StatusTask::create(['title'=>'Возвращена']);

    }
}
