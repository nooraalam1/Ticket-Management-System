@extends('admin.partials.app')
@section('title', 'Stations')
@section('content')
    <div>
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Create Station</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{route('station.store')}}" method="POST">
                                @csrf
                                <div class="d-flex">
                                    <div class="form-group col-6">
                                        <label>Enter Station Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="name" required class="form-control" placeholder="Kamalapur (Dhaka)">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Enter Station Code:<span class="text-danger">*</span></label>
                                        <input type="text" name="code" required class="form-control" placeholder="DHK">
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
