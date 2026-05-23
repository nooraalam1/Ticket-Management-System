@extends('admin.partials.app')
@section('title', 'Seat')
@section('content')
    <div>
        <x-alerts />
        <div class="mb-3 border-top-1 border-top-primary">
            <div class="page-header page-header-light"
                style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <div class="breadcrumb ml-0 mb-1">
                            <h5 class="breadcrumb-item py-0">Seat</h5>
                            {{-- <a href="components_breadcrumbs.html" class="breadcrumb-item py-0">View</a> --}}
                            <h5 class="breadcrumb-item py-0 active">Edit</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('seat.view') }}" class="btn-lg btn-info">View Seats</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 p-0 m-0">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Edit Seat</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{route('seat.update',['id'=>$data->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Select Coach:<span class="text-danger">*</span></label>
                                        <select name="coach_id" class="form-control">
                                            <option value="">--Select Coach--</option>
                                            @foreach ($coaches as $coach)
                                                <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('coach_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Seat Number:<span class="text-danger">*</span></label>
                                        <input type="text" name="seat_number" required class="form-control" placeholder="1"
                                            value="{{$data->seat_number}}">
                                        @error('seat_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Seat Type:<span class="text-danger">*</span></label>
                                        <select name="seat_type" class="form-control">
                                            <option value="">--Seat Type--</option>
                                            <option value="window">Window</option>
                                            <option value="chair">Chair</option>
                                            <option value="middle">Middle</option>
                                        </select>
                                        @error('seat_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection