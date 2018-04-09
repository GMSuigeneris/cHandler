@extends('layouts.app')
@section('content')
<div class="col-sm-9 mx-auto">
            <div class="card mx-auto">
                <div class="card-header text-light" style="background-color:#000;">
                    <div class="row">
                        <div class="col-sm-9"> Tasks </div>
                        <div class="col-sm-2 pull-right"><a class="btn btn-primary btn-sm pull-right" href="/tasks/create">Create New</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($tasks as $task)
                            <li class="list-group-item text-light"><a href="/tasks/{{$task->id}}"><b>{{ $task->name }}</b> </a></li>
                        @endforeach
                    </ul>
                    @if(count($tasks)>4)
                      {{$tasks->links()}} 
                      @endif
                </div>
               
            </div>
        </div>
@endsection

   