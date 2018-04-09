@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">Create new task</div>
                <div class="card card-body">
                    <form action="{{ route('tasks.store') }}" method="post">
                            @csrf
                        
                            <div class="form-group">
                                <label for="task-name" style="background-color:#000; color:#fff; padding:5px;">Name<span class="required">*</span></label>
                                <input placeholder="Enter Name" class="form-control" required id="task-name" name="name" spellcheck="false">
                            </div>

                        @if($projects == null)
                            <input type="hidden" class="form-control" name="project" value="{{$project_id}}">
                        @endif

                        @if($projects != null)
                            <div class="form-group">
                            <label for="project" style="background-color:#000; color:#fff; padding:5px;">Project</label>
                                <select name="project" class="form-control">
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="task-content" style="background-color:#000; color:#fff; padding:5px;">Description</label>
                            <textarea placeholder="Enter Description" class="form-control" style="resize:vertical;" rows="5"  id="task-content" name="description" spellcheck="false" autosize-target text-left></textarea>
                        </div>

                        <div class="form-group">
                            <label for="task-content" style="background-color:#000; color:#fff; padding:5px;">DAYS</label>
                            <input type="number" placeholder="Enter Timeframe(Days)" class="form-control" style="resize:vertical;"  id="task-content" name="days" spellcheck="false" autosize-target text-left>
                        </div>

                        <div class="form_group">
                            <input type="submit" class="btn btn-primary" value="Create"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="sidebar-module">
                <h4>Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="/tasks">My tasks</a></li>
                </ol>
            </div>
        </div>

    </div>
</div>



   

  
@endsection