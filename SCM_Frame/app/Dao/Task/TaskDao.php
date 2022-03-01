<?php

namespace App\Dao\Task;
use App\Task;
use Illuminate\Http\Request;
use App\Contracts\Dao\Task\TaskDaoInterface;


class TaskDao implements TaskDaoInterface
{
    
    public function getTasks()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;
    }

  
    public function addTask(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return $task;
    }

  
    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();
    }
}