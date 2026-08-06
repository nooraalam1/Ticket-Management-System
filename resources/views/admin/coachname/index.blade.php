@extends('admin.partials.app')
@section('title', 'Coach Name')
@section('content')
    <div>
    <x-alerts/>
        <div class="mb-3 border-top-1 border-top-primary">
            <div class="page-header page-header-light"
                style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <div class="breadcrumb ml-0 mb-1">
                            <h5 class="breadcrumb-item py-0">Coach</h5>
                            <h5 class="breadcrumb-item py-0 active">Create</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('coachname.view') }}" class="btn-lg btn-info">View Coaches</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Create Coach<span class="text-danger">*</span> </h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('coachname.store') }}" class="row align-items-between">
                                @csrf
                                @method('POST')
                                <div class="col-6">
                                    <input type="text" name="name" placeholder="Enter Coach Name" class="form-control">
                                @error('name')
                                    <div class="text-danger">
                                        <p>ERROR!! {{$message}}</p>
                                    </div>
                                @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary col-3">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
