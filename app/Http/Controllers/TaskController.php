<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTask;
use App\Models\Category;
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
        $categories = Category::all();
        return view('tasks.createTask', compact('categories'));
    }

    public function store(StoreTask $request)
    {
        
        // Task::create([
        //     'idCategory' => $request->idCategory,
        //     'description' => $request->description,
        //     'frequency' => $request->frequency,
        //     'lastPerformed' => \Carbon\Carbon::parse($request->lastPerformed)->format('Y-m-d'),
        // ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created with success');
    }


    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }
}
