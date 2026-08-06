@extends('admin.partials.app')
@section('title', 'Coaches')
@section('content')
    <div>
    <x-alerts/>
        <div class="mb-3 border-top-1 border-top-primary">
            <div class="page-header page-header-light"
                style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <div class="breadcrumb ml-0 mb-1">
                            <h5 class="breadcrumb-item py-0">Coach Combination</h5>
                            {{-- <a href="components_breadcrumbs.html" class="breadcrumb-item py-0">View</a> --}}
                            <h5 class="breadcrumb-item py-0 active">Create</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('coach.view') }}" class="btn-lg btn-info">View Combinations</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Create Coach Combinations:</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('coach.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Select Train:</label>
                                        <select name="train_id" class="form-control select select2" required>
                                            <option value="">Select Train</option>
                                            @foreach ($trains as $train)
                                            <option value="{{ $train->id }}" {{old('train_id')==$train->id?'selected':''}}>{{ $train->name }} ({{$train->train_number}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Enter Coach Name:<span class="text-danger">*</span></label>
                                        <select name="name" class="form-control select select2" required >
                                            <option value="">Select Coach Name</option>
                                            @foreach ($coachNames as $coachName)
                                                <option value="{{ $coachName->name }}" {{old('name')==$coachName->name?'selected':''}}>{{ $coachName->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Enter Coach Type:<span class="text-danger">*</span></label>
                                        <input type="text" name="type" required class="form-control" placeholder="AC"
                                            value="{{old('type')}}">
                                        @error('type')
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
