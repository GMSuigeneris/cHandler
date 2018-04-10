@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-8 pull-left">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">Project: {{$project->name}}<br>Company:{{$project->company->name}}</div>
                <div class="card card-body text-dark">{{$project->description}}</div>
                <div class="row">
                        <div class="col-sm-1" style="margin-right:45px;"> <button class="btn btn-sm" id="projecttoggle" style="background-color:#b22222; color:white;">View Tasks</button></div>
                        <div class="col-sm-1"><button class="btn btn-sm" style="background-color:black; color:white;" id="commentToggle">View Comments</button></div>
                </div>
            </div>
        </div>

        <div class="pull-right col-sm-2">
            <h4>Actions</h4>
            <ul class="list-unstyled">
               {{--   <li><a href="/projects">My projects</a></li>  --}}
                <li><a href="/projects/create">Add Project</a></li>
                <li><a href="/tasks/create/{{$project->id}}">Create Task</a></li>
                @if($project->user_id == Auth::user()->id)
                <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
                <li><a href="#" onclick="
                    var result = confirm('Are you sure you wish to delete this project?');
                    if(result){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }">Delete</a>
                    <form action="{{ route('projects.destroy',[$project->id]) }}" method="POST" id="delete-form" style="display:none;">
                        @method('delete')
                       @csrf
                    </form>
                </li>
                @endif
            </ul>
        </div>

         <div class="col-md-2">
            <h4>Actions</h4>
            <form action="{{ route('projects.adduser') }}" id="add-user" method="POST">
                 @csrf
                <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="Search by Email...">
                    <input type="hidden" class="form-control" name="project_id" value="{{$project->id}}">
                    <span class="input-group-btn">
                        <input class="btn btn-default" type="submit" value="Add!">
                    </span>
                </div>
            </form>
            <br>
                <h4>Project Members</h4>
                <ul class="list-unstyled">
                    @foreach($project->users as $user)
                        <li><a href="/users">{{$user->email}}</a></li>
                    @endforeach
                </ul>
        </div>

    </div>{{--  End of row  --}}
     @if(count($project->tasks) > 0) 
            <div class="row col-md-9" id="tasks" style="padding:10px; margin:5px; display:none;">
                @foreach($project->tasks as $task)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card card-header text-light" style="background-color:#b22222;">TASK NAME:<br> {{$task->name}}</div>
                            <div class="card card-body">{{$task->description}}</div>
                            <a href="/tasks/{{$task->id}}" class="btn" style="background-color:#000; color:#fff;" role="button">View Details>>></a>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

             @if(count($project->tasks) == 0) 
            <div class="row" id="tasks" style="padding:10px; margin:5px; display:none;">

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card card-header text-light" style="background-color:#b22222;">No Task has been created</div>
                                <div class="card card-body">
                                    <a href="/tasks/create/{{$project->id}}" class="btn" style="background-color:#000; color:#fff;" role="button">Create a task>>></a>
                                </div>
                            </div>
                        </div>
            </div>
            @endif
    </div>{{--  End of row  --}}
</div>{{--  End of container  --}}




<div class="container-fluid">
    <div class="row" style="padding:10px; margin:5px;">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#b22222;">Comment on the Project</div>
                <div class="card card-body">
                    <form action="{{ route('comments.store') }}" method="post">
                                @csrf
                            <input type="hidden" value="App\Project" name="commentable">
                            <input type="hidden" value="{{$project->id}}" name="commentable_id">
                            <div class="form-group">
                                <textarea placeholder="Enter Comment" class="form-control" style="resize:vertical;" rows="2"  id="comment" name="body" spellcheck="false" autosize-target text-left></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="company-content">Proof of work done(Url/Screenshots)</label>
                                <textarea placeholder="Enter url" class="form-control" style="resize:vertical;" rows="1"  id="url" name="url" spellcheck="false" autosize-target text-left></textarea>
                            </div>

                            <div class="form_group">
                                <input type="submit" class="btn btn-dark" value="Create"/>
                            </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.comments')
</div>
@endsection
