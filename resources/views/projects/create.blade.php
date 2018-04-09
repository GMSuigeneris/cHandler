@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-9 mx-auto">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">Create new Project</div>
                <div class="card card-body">
                    <form action="{{ route('projects.store') }}" method="post">
                              @csrf
                        
                            <div class="form-group">
                                <label for="project-name" style="background-color:#000; color:#fff; padding:5px;">Name<span class="required">*</span></label>
                                <input placeholder="Enter Name" class="form-control" required id="project-name" name="name" spellcheck="false">
                            </div>

                            @if($companies == null)
                                <input type="hidden" class="form-control" name="company" value="{{$company_id}}">
                            @endif
                        

                        @if($companies != null)
                            <div class="form-group">
                            <label for="company" style="background-color:#000; color:#fff; padding:5px;">Company</label>
                                <select name="company" class="form-control">
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="project-content" style="background-color:#000; color:#fff; padding:5px;">Description</label>
                                <textarea placeholder="Enter Description" class="form-control" style="resize:vertical;" rows="5"  id="project-content" name="description" spellcheck="false" autosize-target text-left></textarea>
                            </div>

                             <div class="form-group">
                                <label for="task-content" style="background-color:#000; color:#fff; padding:5px;">WEEKS</label>
                                <input type="number" placeholder="Enter Timeframe(Weeks)" class="form-control" style="resize:vertical;"  id="task-content" name="weeks" spellcheck="false" autosize-target text-left>
                            </div>

                            <div class="form_group">
                                <input type="submit" class="btn btn-primary" value="Create"/>
                            </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>



   

  
@endsection