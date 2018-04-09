@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">{{$company->name}}</div>
                <div class="card card-body text-dark">{{$company->description}}</div>
                    <div class="row">
                        <div class="col-sm-1" style="margin-right:45px;"> <button class="btn btn-sm" id="toggle" style="background-color:#b22222; color:white;">View Projects</button></div>
                        <div class="col-sm-1"><button class="btn btn-sm" style="background-color:black; color:white;" id="commentToggle">View Comments</button></div>
                    </div>
            </div>
            @if(count($company->projects) > 0) 
            <div class="row" id="projects" style="padding:10px; margin:5px; display:none;">
            
                    @foreach($company->projects as $project)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card card-header text-light" style="background-color:#b22222;">PROJECT NAME:<br> {{$project->name}}</div>
                                <div class="card card-body">{{$project->description}}</div>
                                <a href="/projects/{{$project->id}}" class="btn" style="background-color:#000; color:#fff;" role="button">View Details>>></a>
                            </div>
                        </div>
                    @endforeach
            </div>
            @endif

             @if(count($company->projects) == 0) 
            <div class="row" id="projects" style="padding:10px; margin:5px; display:none;">

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card card-header text-light" style="background-color:#b22222;">No project has been created</div>
                                <div class="card card-body">
                                    <a href="/projects/create/{{$company->id}}" class="btn" style="background-color:#000; color:#fff;" role="button">Create a project>>></a>
                                </div>
                            </div>
                        </div>
            </div>
            @endif

        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/projects/create/{{$company->id}}" class="action" style="padding:5px; background-color:#b22222; color:white;">Add Project</a></li>
                <li><a href="/companies/create"  style="padding:5px; background-color:#b22222; color:white;">Create New Company</a></li>
                <li><a href="/companies/{{$company->id}}/edit"  style="padding:5px; background-color:#b22222; color:white;">Edit</a></li>
                <br>
                <li>
                <a href="#" onclick="
                    var result = confirm('Are you sure you wish to delete this Company?');
                    if(result){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }"  style="padding:5px; background-color:#b22222; color:white;">Delete
                </a>
                    <form action="{{ route('companies.destroy',[$company->id]) }}" method="POST" id="delete-form" style="display:none;">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    </form>
                </li>
            </ol>
            {{--<h4>COMPANY EMPLOYEES</h4>
            <ul>
            @foreach($company->user_id)
                <li>{{$user}}</li>
            @endforeach
            </ul>--}}
        </div>
    </div>
        
    </div>
</div>

<div class="container-fluid">

    <div class="row" style="padding:10px; margin:5px;">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#b22222;">Comment on the Company</div>
                <div class="card card-body">
                    <form action="{{ route('comments.store') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" value="App\Company" name="commentable">
                            <input type="hidden" value="{{$company->id}}" name="commentable_id">
                            <div class="form-group">
                                <textarea placeholder="Enter Comment" class="form-control" style="resize:vertical;" rows="2"  id="comment" name="body" spellcheck="false" autosize-target text-left></textarea>
                            </div>

                            <div class="form_group">
                                <input type="submit" class="btn" style="background-color:#000; color:#fff;" value="Create"/>
                            </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
     @include('partials.comments')

  {{--    @if(count($comments) > 0) 
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
                                <h6>-Commented on {{ $company->name}}</h6>
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
    @endif  --}}
</div>
@endsection
