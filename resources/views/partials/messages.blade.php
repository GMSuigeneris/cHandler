@if(isset($errors) && count($errors)>0)
     @foreach($errors->all() as $error)
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times; </span>
            </button>
            <li><strong>{{ $error}}</strong></li>
        </div>
     @endforeach
@endif

@if(session()->has('success'))
    <div class="alert alert-dismissable alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
        </button>
        <strong>
            {!! session()->get('success') !!}
        </strong>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-dismissable alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
        </button>
        <strong>
            {!! session()->get('error') !!}
        </strong>
    </div>
@endif