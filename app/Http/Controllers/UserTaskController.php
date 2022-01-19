<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stackflows\Stackflows;

class UserTaskController extends Controller
{
    private Stackflows $stackflows;

    public function __construct(Stackflows $stackflows)
    {
        $this->stackflows = $stackflows;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = $this->stackflows->getUserTasks();

        return view('user_tasks.index', compact('tasks'));
    }

    /**
     * Dispatch the task completion.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function complete($id)
    {
        $task = UserTask::findOrFail($id);

        CompleteTaskJob::dispatch($task);

        $task->status->set(TaskStatus::SENDING);
        $task->save();

        return response()->json([], 204);
    }

    /**
     * Dispatch the completion of all tasks.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function completeAll()
    {
        $tasks = UserTask::where('status', TaskStatus::PENDING)->get();
        foreach ($tasks as $task) {
            CompleteTaskJob::dispatch($task);
        }

        UserTask::whereIn('id', $tasks->pluck('id'))->update(['status' => TaskStatus::SENDING]);

        return redirect()->back();
    }
}
