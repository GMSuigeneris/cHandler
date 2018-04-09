@extends('layouts.app')
@section('content')
<div class="col-sm-9 mx-auto">
    <div class="card mx-auto">
        <div class="card-header text-light" style="background-color:#000;">
            <div class="row">
                <div class="col-sm-9"> Projects </div>
                <div class="col-sm-2 pull-right"><a class="btn btn-primary btn-sm pull-right" href="/projects/create">Create New</a></div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($projects as $project)
                    <li class="list-group-item text-light"><a href="/projects/{{$project->id}}"><b>{{ $project->name }}</b> </a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

   