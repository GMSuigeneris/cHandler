@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card text-light" style="background-color:#000;">
                <div class="card card-header">Task: {{$task->name}}<br>Project: {{$task->project->name}}<br>Company: {{$task->company->name}}</div>
                <div class="card card-body text-dark">{{$task->description}}</div>
                <div class="row">
                        <div class="col-sm-1"><button class="btn btn-sm" style="background-color:black; color:white;" id="commentToggle">View Comments</button></div>
                    </div>
            </div>
        </div>

        <div class="col-sm-2 pull-right">
            <div class="sidebar-module">
                <h4>Actions</h4>
                <ul class="list-unstyled">
               
                    <li><a href="/tasks/create">Add task</a></li>
                    <li><a href="/tasks">My tasks</a></li>
                    @if($task->user_id == Auth::user()->id)
                    <li><a href="/tasks/{{$task->id}}/edit">Edit</a></li>
                    <br>
                    <li><a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this task?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }">Delete
                    </a>
                        <form action="{{ route('tasks.destroy',[$task->id]) }}" method="POST" id="delete-form" style="display:none;">
                            <input type="hidden" name="_method" value="delete">
                            {{csrf_field()}}
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

    </div>
</div>



<div class="container-fluid">
    <div class="row" style="padding:10px; margin:5px;">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#b22222;">Comment on the task</div>
                <div class="card card-body">
                    <form action="{{ route('comments.store') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" value="App\task" name="commentable">
                            <input type="hidden" value="{{$task->id}}" name="commentable_id">
                            <div class="form-group">
                                <textarea placeholder="Enter Comment" class="form-control" style="resize:vertical;" rows="2"  id="comment" name="body" spellcheck="false" autosize-target text-left></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="company-content">Proof of work done(Url/Screenshots)</label>
                                <textarea placeholder="Enter url" class="form-control" style="resize:vertical;" rows="1"  id="url" name="url" spellcheck="false" autosize-target text-left></textarea>
                            </div>

                            <div class="form_group">
                                <input type="submit" class="btn btn-danger" value="Create"/>
                            </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    
     @if(count($comments) > 0) 
    <div class="row" style="display:none;" id="comments">
    <div class="col-sm-4">      
        <div class="card">
            <div class="card-header text-light" style="background-color:#000;"><span class="glyphicon glyphicon-comment"></span> Recent Comments</div>
            <div class="card-body">
                <ul class="media-list">
                    @foreach($comments as $comment)
                        <li class="media">
                            <div class="media-body">
                                <h5 class="media-heading"><a href="Users/{{$comment->user->id}}" class="text-dark">{{ $comment->user->email }}</a></h5>
                                <h6>-Commented on {{ $task->name}}</h6>
                                <p class="text-dark"><b>{{$comment->body}}</b></p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    </div>
    @endif

    @if(count($comments) ==0 )
    <div class="row" style="display:none;" id="comments">
        <div class="col-sm-4">      
            <div class="card">
                <div class="card-header text-light" style="background-color:#000;"><span class="glyphicon glyphicon-comment"></span>No comments</div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection