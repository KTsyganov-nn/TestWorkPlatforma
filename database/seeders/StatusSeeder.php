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
        StatusTask::create(['title'=>'На проверке']);
        StatusTask::create(['title'=>'Возвращена']);
        StatusTask::create(['title'=>'Выполнена']);
        StatusTask::create(['title'=>'Срок выполнения прошел']);

    }
}
