@extends('admin.partials.app')
@section('title', 'Trains')
@section('content')
    <div>
        <div class="mb-3 border-top-1 border-top-primary">
            <div class="page-header page-header-light"
                style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <div class="breadcrumb ml-0 mb-1">
                            <h5 class="breadcrumb-item py-0">Trains</h5>
                            {{-- <a href="components_breadcrumbs.html" class="breadcrumb-item py-0">View</a> --}}
                            <h5 class="breadcrumb-item py-0 active">Create</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('train.view') }}" class="btn-lg btn-info">View Trains</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Create Train</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('train.store') }}" method="POST">
                                @csrf
                                <div class="d-flex">
                                    <div class="form-group col-6">
                                        <label>Enter Train Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="name" required class="form-control"
                                            placeholder="Mohanagar Express">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Enter Train Number:<span class="text-danger">*</span></label>
                                        <input type="text" name="train_number" required class="form-control"
                                            placeholder="740">
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
