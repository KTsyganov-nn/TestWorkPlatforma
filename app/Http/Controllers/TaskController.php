<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Resources\TaskEditResource;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index(request $request)
    {
        $tasks = Task::query()->where('date_start', '<=', Carbon::now())
            ->where('date_end', '>=', Carbon::now())
            ->whereIn('status_id', [1, 2, 4])
            ->where(function ($query) {
                $query->whereNull('user_took_id')
                    ->orWhere('user_took_id', Auth::id());
            }
            )
            ->orderBy('date_start', 'DESC')
            ->paginate(5);
        $data = $tasks->toArray();

        $data['links'][0]['label'] = '« Назад';
        $data['links'][count($data['links']) - 1]['label'] = 'Вперед »';
        return inertia('Task/Index', ['tasks' => TaskResource::collection($tasks),
            'links' => $data['links']
        ]);
    }

    public function create()
    {

        return inertia('Task/Create');
    }

    public function store(TaskCreateRequest $request)
    {

        $task = $request->validated();
        $task['user_id'] = Auth::id();
        $task['status_id'] = 1;
        Task::create($task);

        return redirect()->route('task.index');
    }

    public function show(Task $task)
    {
        return inertia('Task/Show', ['task' => TaskResource::make($task)]);
    }

    public function edit(Task $task)
    {
        return inertia('Task/Edit', ['task' => TaskEditResource::make($task)]);
    }

    public function update(TaskCreateRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);
        return redirect()->route('task.index');

    }

    public function destroy($id)
    {

    }

    public function getTask(Task $task)
    {

        if ($task->status_id == 1 || ($task->status_id == 4 && $task->user_took_id == Auth::id())) {
            $task->update(['status_id' => 2, 'user_took_id' => Auth::id()]);
            return redirect()->route('task.index', ['message_success' => 'Задача успешно взята']);
        } else {
            return redirect()->route('task.index', ['message_error' => 'Не получилось взять задачу']);
        }
    }

    public function cancelTask(Task $task)
    {

        if ($task->status_id == 2 && $task->user_took_id == Auth::id()) {
            $task->update(['status_id' => 4]);
            return redirect()->route('task.index', ['message_success' => 'Задача успешно взята']);
        } else {
            return redirect()->route('task.index');
        }
    }

    public function SuccessTask(Task $task)
    {

        if ($task->status_id == 2 && $task->user_took_id == Auth::id()) {
            $task->update(['status_id' => 3]);
            return redirect()->route('task.index');
        } else {
            return redirect()->route('task.index');
        }
    }

    public function showTasks(User $user)
    {
        return inertia('Task/Index', ['tasks' => TaskResource::collection($user->tasks)]);
    }
}
