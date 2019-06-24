@extends('layouts.app')
@section('content')

<!-- This will need to be done with authentication for logged administrator -->
@if (Auth::check() && Auth::user()->role == 1)
<div class="row">
        <div class="row">
                <div class="action-box text-center">
                        <h1>Edit Portfolio Item Form</h1><br/>
                        <p>Please fill in the form and click 'Save changes!' in order to edit item in the portfolio list</p>
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
                        {!! Form::model($portfolio, ['route' => ['portfolio.update', $portfolio->id], 'files' => 'true', 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}
                                <div class="form-group">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name', $portfolio->name, ['class' => 'form-control']) !!}
                                </div>
                                
                                <div class="form-group">
                                        {!! Form::label('description', 'Description') !!}
                                        {!! Form::text('desc', $portfolio->desc, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                        {!! Form::label('url', 'URL') !!}
                                        {!! Form::text('url', $portfolio->url, ['class' => 'form-control']) !!}
                                </div>
                                
                                {{-- <div class="form-group">
                                        {!! Form::label('image', 'Image URL') !!}
                                        {!! Form::text('img', $portfolio->img, ['class' => 'form-control']) !!}
                                </div> --}}

                                <div class="form-group">
                                        {!! Form::label('img', 'Image Input') !!} <br/>
                                        {!! Form::file('img') !!} <br/><br/>
                                        @if($portfolio->img)
                                        <img src="{{ url('/images/portfolio/' . $portfolio->img) }}" class="portfolio-img center"/>
                                        @endif
                                </div>
                                
                                <button class="btn btn-success" type="submit">Save changes!</button>
                        {!! Form::close() !!}
                </div>
        </div>
    </div>  
@endif
<!-- End of authentication -->
@stop