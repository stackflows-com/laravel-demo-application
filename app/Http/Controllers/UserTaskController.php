<?php

namespace App\Http\Controllers;

use App\Stackflows\UserTask\UserTask;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = UserTask::pending()->get();
        return view('user_tasks.index', compact('tasks'));
    }
}
