@if(count($comments) > 0) 

<div class="row" id="comments" style="display:none;">
    <div class="col-sm-4 mx-auto">      
        <div class="card">
            <div class="card-header text-light" style="background-color:#000;"><span class="glyphicon glyphicon-comment"></span> Recent Comments</div>
            <div class="card-body">
                <ul class="media-list">

                    @if(count($project->comments)>0)
                        @foreach($comments as $comment)
                            <li class="media">
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="Users/{{$comment->user->id}}" class="text-dark">{{ $comment->user->email }}</a></h5>
                                    <h6>-Commented on {{ $project->name}}</h6>
                                    <p class="text-dark"><b>{{$comment->body}}</b></p>
                                    <p class="text-primary"><b>Project Link: </b> {{$comment->url}}</p>
                                </div>
                            </li>
                            <hr>
                        @endforeach

                    @elseif(count($company->comments)>0)
                        @foreach($comments as $comment)
                            <li class="media">
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="Users/{{$comment->user->id}}" class="text-dark">{{ $comment->user->email }}</a></h5>
                                    <h6>-Commented on {{ $company->name}}</h6>
                                    <p class="text-dark"><b>{{$comment->body}}</b></p>
                                </div>
                            </li>
                        @endforeach


                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
 @endif

 @if(count($comments) == 0 )
    <div class="row" style="display:none;" id="comments">
        <div class="col-sm-4">      
            <div class="card">
                <div class="card-header text-light" style="background-color:#000;"><span class="glyphicon glyphicon-comment"></span>No comments</div>
            </div>
        </div>
    </div>
@endif

   
