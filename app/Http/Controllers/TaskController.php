<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateTask;
use App\Http\Requests\StoreTask;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;



class TaskController extends Controller
{

    public readonly Task $task;

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

       

        $created = $this->task->create([
            'description' => $request->input('description'),
            'idCategory' => $request->input('idCategory'),
            
        ]);
        
        if($created){
            return redirect()->route('tasks.index')->with('message', 'Task criada com sucesso');
        }

        return redirect()->route('tasks.index')->with('message', 'Erro! Task não criada');
       

    }

    public function edit(string $id)
    {
      
        $categories = Category::all();
        if(!$task = Task::find($id)){
            return redirect()->route('tasks.index')->with('message', 'task não encontrada');
        }
        return view('tasks.updateTask', compact('task', 'categories'));
    }

    public function update(UpdateTask $request, string $id)
    {
        
        $updated = $this->task->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->route('tasks.index')->with('message', 'Atualizado com sucesso');
        }
        
    }
    

    public function show(Task $task)
    {
        return view('tasks.showTask', ['task' => $task]);
    }

    public function destroy(string $id)
    {
        $this->task->where('id', $id)->delete();

        return redirect()->route('tasks.index')->with('message', 'Excluído com sucesso');
    }
}
