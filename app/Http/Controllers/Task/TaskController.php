<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Service\TaskService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateeTask;

class TaskController extends Controller
{
    protected $taskService ;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskService->showDailyTask();
        return view('Tasks.index',[
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTask $request)
    {
        $validated = $request->validated();
        $task = $this->taskService->storeTask($validated); 
        return to_route('task.index')->with('success','Create New Task Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('Tasks.show',['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('Tasks.edit',['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateeTask $request, Task $task)
    {
        $task = $this->taskService->updateTask($request->validated(),$task);
        return to_route('task.index')->with('success','Update Task Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return to_route('task.index')->with('successDelete','Delete Task Successfully');
    }

    /**
     * Change the status of the task
     */

     public function changeStatus(Task $task)
     {
        $this->taskService->editStatus($task);
        return to_route('task.index')->with('success','Change Status Successfully');
     }

     /**
      * Search on the tasks
      */
      public function search(Request $request)
      {
        $tasks = $this->taskService->showMulti($request->search);
        return view('Tasks.index',[
            'tasks' => $tasks
        ]);
      }
}
