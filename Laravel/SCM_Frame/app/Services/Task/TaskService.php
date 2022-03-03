<?php

namespace App\Services\Task;

use Illuminate\Http\Request;
use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;

class TaskService implements TaskServiceInterface {
 
    private $taskDao;
    
   
    public function __construct(TaskDaoInterface $taskDao) {
        $this->taskDao = $taskDao;
    }

   
    public function getTasks() {
        return $this->taskDao->getTasks();
    }

   
    public function addTask(Request $request) {
        return $this->taskDao->addTask($request);
    }


    public function deleteTask($id) {
        return $this->taskDao->deleteTask($id);
    }
}