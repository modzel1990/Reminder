@extends('layouts.app')
@section('content')

<div class="row">
    <div class="error-box text-center">
        <h2>Authentication Failed</h2><br/>
        <p>You have no permission to enter this part of the site.</p><br/>
        <a href="{{ URL::previous() }}"><button type="button" class="btn btn-success">Go back</button></a>
    </div>
</div>

@stop