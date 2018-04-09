@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-lg-9 mx-auto">
            <div class="card">
                <div class="card card-header text-light" style="background-color:#000;">Create new Company</div>
                <div class="card card-body">

                     <div class="col-sm-12 " style="padding:10px; margin:5px;">
                        <form action="{{ route('companies.store') }}" method="post">
                            {{ csrf_field() }}
                        
                            <div class="form-group">
                                <label for="company-name" style="background-color:#000; color:#fff; padding:5px;">Name<span class="required">*</span></label>
                                <input placeholder="Enter Name" class="form-control" required id="company-name" name="name" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label for="company-content" style="background-color:#000; color:#fff; padding:5px;">Description</label>
                                <textarea placeholder="Enter Description" class="form-control" style="resize:vertical;" rows="5"  id="company-content" name="description" spellcheck="true" autosize-target text-left></textarea>
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
</div>
@endsection