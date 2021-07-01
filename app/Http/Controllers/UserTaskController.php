<?php

namespace App\Http\Controllers;

use App\Stackflows\TaskStatus;
use App\Stackflows\UserTask\CompleteTaskJob;
use App\Stackflows\UserTask\UserTask;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = new TaskStatus();
        if (TaskStatus::valid($request->get('status'))) {
            $status->set($request->get('status'));
        }

        $tasks = UserTask::where('status', $status->get())->get();

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
