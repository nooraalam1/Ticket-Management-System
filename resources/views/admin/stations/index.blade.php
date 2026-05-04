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
                            <form action="#">
                                <div class="d-flex">
                                    <div class="form-group col-6">
                                    <label>Enter Station Name:</label>
                                    <input type="text" class="form-control" placeholder="Kamalapur (Dhaka)">
                                </div>
                                <div class="form-group col-6">
                                    <label>Enter Station Code:</label>
                                    <input type="text" class="form-control" placeholder="DHK">
                                </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit form </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
