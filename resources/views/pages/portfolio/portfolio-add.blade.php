@extends('layouts.app')
@section('content')

<!-- This will need to be done with authentication for logged administrator -->
@if (Auth::check() && Auth::user()->role == 1)
<div class="row">
        <div class="row">
                <div class="action-box text-center">
                        <h1>Add Portfolio Item Form</h1><br/>
                        <p>Please fill in the form and click 'Save!' in order to add item to the portfolio list</p>
                        <a href="{{url('/portfolio')}}" alt="Back Button"><button type="button" class="btn btn-success">Back to Portfolio</button></a>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-box">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                        <ul>
                                                @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                @endforeach
                                        </ul>
                                </div><br />
                        @endif
                        {!! Form::model($portfolio, ['action' => 'PortfolioController@store', 'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
                                <div class="form-group">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                                </div>
                                
                                <div class="form-group">
                                        {!! Form::label('description', 'Description') !!}
                                        {!! Form::text('desc', '', ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                        {!! Form::label('url', 'URL') !!}
                                        {!! Form::text('url', '', ['class' => 'form-control']) !!}
                                </div>
                                
                                {{-- <div class="form-group">
                                        {!! Form::label('image', 'Image URL') !!}
                                        {!! Form::text('img', '', ['class' => 'form-control']) !!}
                                </div> --}}

                                <div class="form-group">
                                        {!! Form::label('img', 'Image Input') !!} <br/>
                                        {!! Form::file('img') !!}
                                </div>
                                
                                <button class="btn btn-success" type="submit">Save!</button>
                        {!! Form::close() !!}
                </div>
        </div>
    </div>  
@endif
<!-- End of authentication -->
@stop