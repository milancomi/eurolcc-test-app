<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectAssignment;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        return view('project.index',compact('projects','users'));
    }


    public function create(Request $request)
    {


        $project_id = $request->project;
        $user_id = $request->user;
        if($project_id == 0 || $user_id == 0)
        {
            return back()->with('error','errorData');

        } else{
        $project_assignment = new ProjectAssignment();
        $project_assignment->user_id = $user_id;
        $project_assignment->project_id = $project_id;
        $project_assignment->save();



        $project = Project::where('id',$project_id)->first();
        $project_data_id = $project_assignment->project_id;
        $user = User::where('id',$user_id)->first();

        return redirect()->route('task.create')->with(['projectData'=>$project,'userData'=>$user,'projectAssignmentData'=>$project_assignment,'projectIdData'=>$project_data_id]);
        }

    }
}
