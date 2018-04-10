<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::check()){
            if(Auth::user()->role_id == 1){
                $projects= Project ::all();
                return view('projects.index',['projects'=>$projects]);
            }else{
                $projects= Project::where('user_id',Auth::user()->id)->get();
                return view('projects.index',['projects'=>$projects]);
            }
        }
        return view('auth.login');
    }

    public function adduser(Request $request){
        $project = Project:: find($request->input('project_id'));
        if(Auth::user()->id == $project->user_id){
        $user = User:: where('email',$request->input('email'))->first();
            if($user  && $project){
                //write a code to check if user has been signed up         
                   
                $project->users()->attach($user->id);
                return redirect()->route('projects.show',['project'=>$project->id])
                ->with('success',$request->input('email').' has been added to the project successfully');
            }    
        }
        return redirect()->route('projects.show',['project'=>$project->id])
        ->with('error','User does not exist');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null){
        $companies =null;
        if(!$company_id){
            $companies = Company::where('user_id',Auth::user()->id)->get();
        }
            return view ('projects.create',['company_id'=>$company_id,'companies'=>$companies]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if(Auth::check()){
            $project = Project:: create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'company_id'=>$request->input('company'),
                'weeks'=>$request->input('weeks'),
                'user_id'=>$request->user()->id
            ]);

            if($project){
                return redirect()->route('projects.show',['project'=>$project->id])
                ->with('success','project created successfully');
            }
        }
        return back()->withInput()->with('errors','Error occured, Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $project= Project::find($id);
        $comments = $project->comments;
        return view('projects.show',['project'=>$project,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project){
        $project= Project::find($project->id);
        return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project){
        //save data
        $projectUpdate = Project::where('id',$project->id)
        ->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'weeks'=>$request->input('weeks'),
        ]);

        if($projectUpdate){
            return redirect()->route('projects.show',['projects'=>$project->id])
            ->with('success','Project updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project){
        $findproject= Project::find($project->id);

        if($findproject->delete()){
            return redirect()->route('projects.index')
            ->with('success','project deleted successfully');
        }
        //redirect
        return back()->withInput()->with('error','project could not be deleted');
    }
}
