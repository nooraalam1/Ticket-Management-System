@extends('admin.partials.app')
@section('title', 'Coach Names')
@section('content')
    <div>
    <x-alerts/>
        <div class="mb-3 border-top-1 border-top-primary">
            <div class="page-header page-header-light"
                style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <div class="breadcrumb ml-0 mb-1">
                            <h5 class="breadcrumb-item py-0">Coach Names</h5>
                            <h5 class="breadcrumb-item py-0 active">Edit</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('coach.view') }}" class="btn-lg btn-info">View Coaches</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 p-0 m-0">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Edit Coach</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{route('coachname.update',['id'=>$data->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="name" value="{{$data->name}}" placeholder="Enter Coach Name" class="form-control">
                                        @error('name')
                                            <p class="text-danger">ERROR!! {{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
