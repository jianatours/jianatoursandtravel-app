@extends('layouts.base')
@section("custom_css")
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title p-4">
                        <div class="col-md-12">
                            <a href="{{route('hotel.create')}}" class="btn btn-primary float-right">Register new hotel</a>
                            <h4 class="mb-1 mt-0">Manage Registered Hotels</h4>
                    </div>
                </div>

                    <div class="row my-3">
                        @foreach ($hotels as $hotel)
                            <div class="col-lg-4">
                                <div class="card">
                                        <img class="img-fluid card-img-top" src="{{$hotel->cover_photo}}"
                                            alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{route('hotels.preview', ['hotel' => $hotel])}}">{{$hotel->name}}</a></h5>
                                        <p class="card-text">{{$hotel->description}}</p>
                                        <a href="{{route('hotels.preview', ['hotel' => $hotel])}}" class="btn btn-primary">Preview</a>
                                        <a href="{{route('hotel.edit', ['hotel' => $hotel])}}" class="btn btn-warning">Edit</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                       
                    </div>
        </div>
    </div>

@endsection


@section("javascript")
@stop
