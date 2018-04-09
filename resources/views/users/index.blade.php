@extends('layouts.app')
@section('content')
        <div class="col-sm-9 mx-auto">
            <div class="card mx-auto">
                <div class="card-header text-light" style="background-color:#000;">
                    <div class="row">
                        <div class="col-sm-9"> Companies </div>
                        <div class="col-sm-2 pull-right"><a class="btn btn-primary btn-sm pull-right" href="/companies/create">Create New</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($companies as $company)
                            <li class="list-group-item text-light"><a href="/companies/{{$company->id}}"><b>{{ $company->name }}</b> </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection