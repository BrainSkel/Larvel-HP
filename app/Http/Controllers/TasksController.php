<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;



class TasksController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        return "Hello from the other side";
    }


    public function create(Task $newTask)
    {
        # code...
    }

    public function delete(Task $taskToDelete) {
        # code...
    }

}

