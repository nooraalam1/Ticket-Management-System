@extends('admin.partials.app')
@section('title', 'Routes')
@section('content')
    <div>
        <x-alerts />
        <div class="mb-3 border-top-1 border-top-primary">
            <div class="page-header page-header-light"
                style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <div class="breadcrumb ml-0 mb-1">
                            <h5 class="breadcrumb-item py-0">Routes</h5>
                            {{-- <a href="components_breadcrumbs.html" class="breadcrumb-item py-0">View</a> --}}
                            <h5 class="breadcrumb-item py-0 active">View</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('route.create') }}" class="btn-lg btn-info">Create Routes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Select a Train to view It's Routes</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="#" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Select Train: <span class="text-danger">*</span></label>
                                        <select id="trainIdAjax" name="train_id" class="form-control select select2"
                                            required>
                                            <option value="">Select Train</option>
                                            @foreach ($trains as $train)
                                                <option value="{{ $train->id }}">{{ $train->name }} ({{ $train->train_number }})</option>
                                            @endforeach
                                        </select>
                                        @error('train_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <h3 class="text-center">Route Details for <span id="setTrainName" style="color:green; font-weight:bold"></span></h3>
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Station</th>
                                                <th>Stop Order</th>
                                                <th>Arrival Time</th>
                                                <th>Departure Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="text-align: center;">
                                                    @foreach ($stations as $station)
                                                <td id="station">

                                                </td>
                                                    @endforeach
                                                <td>
                                                    <input type="number" name="stop_order" min="1">
                                                </td>
                                                <td>
                                                    <input type="time" name="arrival_time">
                                                </td>
                                                <td>
                                                    <input type="time" name="departure_time">
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger">Edit</button>
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#trainIdAjax').change(function () {
                var id = $(this).val()
                if (id) {
                    $.ajax({
                        url: '/train-name/' + id,
                        method: 'GET',
                        success: function (data) {
                            $('#setTrainName').text(data.name)
                            //$('#station').text(data.id)
                        }
                    })
                }
                else {
                    $('#setTrainName').text('')
                }
            });
        });
    </script>
@endsection
