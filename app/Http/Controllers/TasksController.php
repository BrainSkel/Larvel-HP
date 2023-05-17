<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;



class TasksController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        Route::get('/', function () {
            $tasks = Task::orderBy('created_at', 'asc')->get();

            return view('tasks', [
                'tasks' => $tasks
            ]);
        });
    }


    public function create(Task $newTask)
    {
        Route::post('/tasks', function (Request $request) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
            }

            $task = new Task;
            $task->name = $request->name;
            $task->save();

            return redirect('/');
        });
    }

    public function delete(Task $taskToDelete) {
        Route::delete('/task/{id}', function ($id) {
            Task::findOrFail($id)->delete();

            return redirect('/');
        });
    }

}

