@extends('layouts.app')
@section('content')

<!-- This will need to be done with authentication for logged administrator -->
@if (Auth::check() && Auth::user()->role == 1)
    <div class="row">
        <div class="action-box text-center">
            @if(session()->has('message'))
                <div id="successmsg" class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
                <div class="admininfo-box text-center">
                    <p>Welcome <span class="usercolor">{{ Auth::user()->name }}</span> ! You can <span class="add">Add</span>&nbsp<span class="edit">Edit</span>&nbsp<span class="remove">Remove</span> portfolio items by pushing corresponding buttons. </p>
                    <a href="{{url('/portfolio-add')}}" alt="Add Portfolio Item"><button type="button" class="btn btn-success">Add Portfolio Item</button></a>
                </div>
        </div>
    </div>
@endif
<!-- End of authentication -->
<br/>
    <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-10 center">
            <div class="row">
            @foreach($portfolios as $portfolio)

            <div class="col-sm-12 col-md-4 col-lg-4 pad-bottom-30">
                <div class="portfolio-box">
                    <a href="{{ $portfolio->url }}">
                        <span class="portfolio-hrline-effect"></span>
                        <span class="portfolio-vrline-effect"></span>
                        <div class="portfolio-caption-box">
                            <h3>Title: {{ $portfolio->name }}</h3><br/>
                            <p>Description: {{ $portfolio->desc }}</p><br/>
                        </div>
                        <div class="portfolio-img-box">
                            <img class="portfolio-img" src="{{ url('/images/portfolio/' . $portfolio->img) }}"/>
                        </div>
                    </a>
                </div>
                
                <!-- This will need to be done with authentication for logged administrator -->
                @if (Auth::check() && Auth::user()->role == 1)
                <div class="row">
                    <div class="action-box text-right">
                        <a href="{{ route('portfolio.edit',$portfolio->id) }}" alt="Edit Portfolio Item"><button type="button" class="btn btn-orangewarning">Edit</button></a>
                        <a href="{{ route('portfolio.delete',$portfolio->id) }}" onclick="return confirm('Are you sure you want to delete that item?')" alt="Remove"><button type="button" class="btn btn-danger">Remove</button></a>
                    </div>
                </div>
                @endif
                <!-- End of authentication -->

            </div>

            @endforeach
            </div>
        </div>
    </div>
@stop