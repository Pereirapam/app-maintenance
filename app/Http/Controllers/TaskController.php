<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $task;

    public function __construct() 
    {
        $this->task = new Task();
    }

    public function index()
    {
        $tasks = $this->task->all();
        return view('tasks.dash_task', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.createTask');
    }

    public function store($request)
    {
       
    }


    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }
}
