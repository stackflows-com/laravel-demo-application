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
}
