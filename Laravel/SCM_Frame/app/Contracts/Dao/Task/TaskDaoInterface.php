<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

interface TaskDaoInterface
{   
   
    public function getTasks();

   
    public function addTask(Request $request);

    
    public function deleteTask($id);
}