@extends('layouts.app')
@section("custom_css")
<style>
    #hotel-name {
        font-size: 1.7rem;
        font-weight: bold;
    }
</style>
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger text-center">
                            {{$error}}
                        </div>
                        @endforeach
                    @endif
                    <div class="card mb-4">
                        <div class="hotel-covers-carousel m-5">
                            @foreach ($images as $image)
                            <div class="carousel-cell">
                                <div class="card-img-top text-center">
                                    <img class="img-fluid" src="{{$image}}" alt="hotel image">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex m-auto">
                            <a href="{{route('hotels.add_images', ['hotel' => $hotel])}}" class="btn btn-outline-info" id="add_more_cover_images">Add More Images</a>
                        </div>
                        <div class="card-body">
                                <h4 class="card-title"><span id="hotel-name">{{$hotel->name}}</span> 
                                    @if ($hotel->verified)
                                    <span class="badge badge-success">Verified</span>
                                @else
                                    <span class="badge badge-warning">Not verified</span>
                                @endif
                                </h4>
                                
                            <p>{{$hotel->description}}</p>
                            
                            <h5>Fascilities</h5>
                            @if ($facilities->count() > 1)
                                <ul>
                                    @foreach ($facilities as $f)
                                        <li>{{$f->name}}</li>
                                    @endforeach
                                </ul>
                            @else
                                    <li><p class="text-warning">No faciliry attached to the hotel yet</p></li>
                            @endif

                            <p class="text-bold">Add Hotel fascilies</p>
                            <form action="{{route('hotel.update', ['hotel' => $hotel])}}" method="post">
                                @csrf
                                @method('put')
                                <select name="facilities[]" class="form-control" multiple id="facilities-select">
                                    @foreach ($allFacilities as $facility)
                                        <option value="{{$facility->id}}">{{$facility->name}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="Add" class="btn btn-warning mt-2">
                            </form>

                            <div class="my-3">
                                <h5>Location</h5>
                                <p>Located in {{$hotel->district.' , '.$hotel->address}}</p>
                            </div>

                            <div class="my-3">
                                <h5>Hotel policies</h5>
                                <div class="row">
                                    <div class="col-lg-4">
                                        Open 24/7
                                    </div>
                                    <div class="col-lg-4">
                                        Tight Security
                                    </div>
                                    <div class="col-lg-4">
                                        No pets Allowed
                                    </div>
                                </div>
                            </div>

                            <div class="my-3">
                                <h5>Available rooms</h5>

                                <div class="row">
                                    @forelse ($hotel->rooms as $room)
                                        <div class="card col-lg-4">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-md-5">
                                                    <img src="{{$room->room_image}}" class="card-img img-fluid" alt="hotel room picture">
                                                    </div>
                                                    <div class="col-md-7">
                                                    <div class="card-body">
                                                        <h5 class="card-title font-size-16">{{$room->name}}</h5>
                                                        <p class="card-text text-muted">{{$room->description}}</p>
                                                        <p class="room-price">{{$room->price}} UGX</p>
                                                        <p class="card-text"><small class="text-muted">Status: @if ($room->is_bookable == true)
                                                            <span class="text-success">Available</span></small>
                                                        @else
                                                        <span class="text-danger">Sold out</span></small>
                                                            
                                                        @endif</p>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                @empty
                                <p class="text-center text-warning">No registered rooms yet</p>
                                @endforelse
                                </div>
                            </div>
                                <button  type="button" class="btn btn-warning" data-toggle="modal" data-target="#addroom-modal">Add a Room</button>

                                {{-- Modal start --}}
                                <div class="modal fade" id="addroom-modal" tabindex="-1" role="dialog" aria-labelledby="myAddRoomLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myAddRoomLabel">Add Room</h5>
                                                            
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="POST" action="{{route('room.store')}}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group row mb-3">
                                                                <label for="room-name" class="col-3 col-form-label">Name</label>
                                                                <div class="col-9">
                                                                    <input type="text" class="form-control" id="room-name" name="name" placeholder="Room name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <label for="room-description" class="col-3 col-form-label">Description</label>
                                                                <div class="col-9">
                                                                    <textarea name="description" id="room-description" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <label for="room-price" class="col-3 col-form-label">Price</label>
                                                                <div class="col-9">
                                                                    <input type="text" class="form-control" id="room-price" name="price" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <label class="col-3 col-form-label" for="image-input">Room Image</label>
                                                                <div class="col-9">
                                                                    <input type="file" class="form-control" id="image-input" name="room_image">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3 justify-content-end">
                                                                <div class="col-9">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="availability" name="availability">
                                                                        <label class="custom-control-label" for="availability" name="availability">Available</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                                                            <div class="form-group mb-0 justify-content-end row">
                                                                <div class="col-9">
                                                                    <button type="submit" class="btn btn-info text-white">Add</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                {{-- Modal end --}}

                                <div class="my-3">
                                    <h5>Contact</h5>
                                    <p>Phone: {{$hotel->phone}}</p>
                                    <p>Email: {{$hotel->email}}</p>
                                </div>
                        </div>
                        <div class="d-flex justify-content-end mb-4 mr-3">
                            <a href="{{route('hotel.edit', ['hotel' => $hotel])}}" class="btn btn-warning mr-2">Edit</a>
                            <a href="javascript: void(0);" class="btn btn-danger">Request to Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section("javascript")
@stop
