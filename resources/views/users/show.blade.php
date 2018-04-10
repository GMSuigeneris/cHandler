@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="background-color:#000; color:#fff;">DASHBOARD</div>
                <div class="card-body">
                   <div class="row">
                    <div class="col-sm-2">
                         <img src="/storage/cover_images/{{Auth::user()->avatar}}" alt="User image" id="image">
                         <br><br>
                         <a href="/users/{{Auth::user()->id}}/edit"><button class="btn btn-danger btn-sm">Edit Profile</button></a>
                    </div>
                     <div class="col-sm-9">
                        <ul style="list-style:none;">
                            <li class="profile">Name: {{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->last_name}} </li>
                            <li class="profile">Email: {{Auth::user()->email}}</li>
                            <li class="profile">Username: {{Auth::user()->username}} </li>
                             <li class="profile">City: {{Auth::user()->city}} </li>
                        </ul>
                     </div>
                  </div>
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