<?php

namespace App\Service;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class TaskService
{

    /**
     *  show all user's Task
     * @return Task[]|\Illuminate\Database\Eloquent\Collection
     */
    public function showDailyTask()
    {
        $cachKey = 'user.tasks_'.Auth::id();
        $tasks = Cache::remember($cachKey,now()->addMinutes(60),function()
        {
           return Task::where('user_id',Auth::id())
                       ->get();
        });

        return $tasks;
    }
    /**
     * store Task
     * @param mixed $validated
     * @return Task|\Illuminate\Database\Eloquent\Model
     */
    public function storeTask($validated)
    {
        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'status' => $validated['status'],
            'user_id' => Auth::id()
        ]);
       Cache::forget( 'user.tasks_'.Auth::id());
        return $task;
        
    }
    /**
     *update Task
     * @param array $data
     * @param mixed $task
     * @return mixed
     */
    public function updateTask(array $data,$task)
    {
        $task->title = $data['title']?? $task->title;
        $task->description = $data['description']?? $task->description;
        $task->due_date = $data['due_date']?? $task->due_date;
        $task->save();
        Cache::forget( 'user.tasks_'.Auth::id());
        return $task;      
    }
    /**
     * Change the status of the Task
     * @param mixed $task
     * @return void
     */
    public function editStatus($task)
    {
        if($task->status == 'Pending')
        {
            $task->status = 'Completed';
        }else{
            $task->status = 'Pending';
        }
        $task->save();
        Cache::forget( 'user.tasks_'.Auth::id());
    }

    public function showMulti(string $search)
    {
        $tasks_search = Task::where('title','LIKE','%'.$search.'%')->get();
        return $tasks_search;
      
    }
}