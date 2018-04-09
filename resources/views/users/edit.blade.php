  @extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-lg-9 pull-left">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">Update Company</div>
                <div class="card card-body">
                    <form action="{{ route('companies.update',[$company->id]) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="company-name"  style="background-color:#000; color:#fff; padding:5px;">Name<span class="required">*</span></label>
                            <input placeholder="Enter Name" class="form-control" required id="company-name" name="name" spellcheck="false" value="{{$company->name}}">
                        </div>

                        <div class="form-group">
                            <label for="company-content"  style="background-color:#000; color:#fff; padding:5px;">Description</label>
                            <textarea placeholder="Enter Description" class="form-control" style="resize:vertical;" rows="5"  id="company-content" name="description" spellcheck="false" autosize-target text-left>{{$company->description}}</textarea>
                        </div>

                        <div class="form_group">
                            <input type="submit" class="btn btn-primary" value="Update"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/companies/{{$company->id}}"><b>View Company Details</b></a></li>
            </ol>
        </div>
    </div>

    </div>
</div>
@endsection