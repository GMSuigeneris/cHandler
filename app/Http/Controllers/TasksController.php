<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::check()){
            if(Auth::user()->role_id == 1){
                $tasks= Task ::paginate(5);
                return view('tasks.index',['tasks'=>$tasks]);
            }else{
                $tasks= Task::where('user_id',Auth::user()->id)->get();
                return view('tasks.index',['tasks'=>$tasks]);
            }
        }
        return view('auth.login'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id = null){
        $projects =null;
        if(!$project_id){
            $projects = Project::where('user_id',Auth::user()->id)->get();
        }
            return view ('tasks.create',['project_id'=>$project_id,'projects'=>$projects]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       $company = Project::where('id',$request->input('project'))->get(['company_id'])->first();
        if(Auth::check()){
            $task = Task:: create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'company_id'=>$company->company_id,
                'project_id'=>$request->input('project'),
                'days'=>$request->input('days'),
                'user_id'=>$request->user()->id
            ]);

            if($task){
                return redirect()->route('tasks.show',['task'=>$task->id])
                ->with('success','Task created successfully');
            }
        }
        return back()->withInput()->with('errors','Error occured, Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task){
        $task= Task::find($task->id);
        $comments = $task->comments;
        return view('tasks.show',['task'=>$task,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task= Project::find($task->id);
        return view('tasks.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task){
        //save data
        $taskUpdate = Task::where('id',$task->id)
        ->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'days'=>$request->input('days'),
        ]);

        if($taskUpdate){
            return redirect()->route('tasks.show',['tasks'=>$task->id])
            ->with('success','Task updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task){
        //
    }
}
