<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('task.index',compact('tasks'));
    }




    public function create(Request $request)
    {

        $tasks = $request->tasks;
        $project_assignment_id = $request->project_assignment_id;


        foreach ($tasks as $key=>$value)
        {

            UserTask::create([
                'project_assignment_id'=>$project_assignment_id,
                'task_id' =>$value
            ]);
        }

        
        return redirect()->route('home.index')->with('success','successData');

    }

}
