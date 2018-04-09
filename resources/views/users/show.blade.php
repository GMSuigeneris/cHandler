@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card" style="background-color:#000; color:#fff;">
                <div class="card card-header">
                    {{Auth::user()->username}}<br>

                </div>
                <div class="card card-body" style="color:#b22222">
                   <div class="mx-auto"> <img src="{{Auth::user()->image}}" alt="User image" id="image"></div>
                        <ul style="list-style:none; margin-top:5px;">
                        <li style="padding:3px; font-family:bold; border:2px solid black">Name: {{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}} </li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Email: {{Auth::user()->email}}</li>
                        <li style="padding:3px; font-family:bold; border:2px solid black">Gender: {{Auth::user()->gender}} </li>
                     </ul>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="container-fluid">
    <div class="row" style="padding:10px; margin:5px;">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#b22222;">Comment on the User</div>
                <div class="card card-body">
                    <form action="{{ route('comments.store') }}" method="post">
                            @csrf
                            <input type="hidden" value="App\user" name="commentable">
                            <input type="hidden" value="{{Auth::user()->id}}" name="commentable_id">
                            <div class="form-group">
                                <textarea placeholder="Enter Comment" class="form-control" style="resize:vertical;" rows="2"  id="comment" name="body" spellcheck="false" autosize-target text-left></textarea>
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
                                <h6>-Commented on {{ Auth::user()->name}}</h6>
                                <p class="text-dark"><b>{{$comment->body}}</b></p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    </div>
    @elseif(count($comments) ==0 )
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