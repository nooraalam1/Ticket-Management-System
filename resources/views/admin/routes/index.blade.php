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
                            <h5 class="breadcrumb-item py-0 active">Create</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('route.view') }}" class="btn-lg btn-info">View Routes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Create Route</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('route.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Select Train: <span class="text-danger">*</span></label>
                                        <select id="trainIdAjax" name="train_id" class="form-control select select2"
                                            required>
                                            <option value="">Select Train</option>
                                            @foreach ($trains as $train)
                                                <option value="{{ $train->id }}">{{ $train->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('train_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <h3 class="text-center">Add Route Details for <span id="setTrainName"
                                        style="color:green; font-weight:bold"></span></h3>
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>
                                                    Station
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#addStation">+</button>
                                                </th>
                                                <th>Stop Order</th>
                                                <th>Arrival Time</th>
                                                <th>Departure Time</th>
                                                <th>Action <button type="button" class="btn btn-sm btn-info"
                                                        id="addRow">+</button></th>
                                            </tr>
                                        </thead>
                                        <tbody id= "routeTableBody">
                                            <tr style="text-align: center;">
                                                <td>
                                                    <select name="station_id[]"
                                                        class="form-control select select2 stationSelect" required>
                                                        <option value="">Select Station</option>
                                                        @foreach ($stations as $station)
                                                            <option value="{{ $station->id }}">{{ $station->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="stop_order[]" min="1">
                                                </td>
                                                <td>
                                                    <input type="time" name="arrival_time[]">
                                                </td>
                                                <td>
                                                    <input type="time" name="departure_time[]">
                                                </td>
                                                <td>

                                                    <button type="button" class="btn btn-sm btn-danger deleteRow"><i
                                                            class="icon-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="addStation" tabindex="-1" aria-labelledby="addStationLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addStationLabel">Add New Station</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <form action="{{ route('station.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label>Enter Station Name:<span class="text-danger">*</span></label>
                                                        <input id="stationName" type="text" name="name" required
                                                            class="form-control" placeholder="Kamalapur (Dhaka)"
                                                            value="{{ old('name') }}">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label>Enter Station Code:<span class="text-danger">*</span></label>
                                                        <input id="stationCode" type="text" name="code" required
                                                            class="form-control" placeholder="DHK"
                                                            value="{{ old('code') }}">
                                                        @error('code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class=" d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary"
                                                        id="submitBtn">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#trainIdAjax').change(function() {
                var id = $(this).val()

                if (id) {
                    $.ajax({
                        url: '/train-name/' + id,
                        type: 'GET',
                        success: function(data) {
                            $('#setTrainName').text(data.name)
                        },
                    });
                } else {
                    $('#setTrainName').text('');
                }
            });

            $('#addRow').click(function() {
                let newRow = `
            <tr style="text-align: center;">
                <td>
                    <select name="station_id[]" class="form-control select select2" required>
                        <option value="">Select Station</option>
                        @foreach ($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td> <input type="number" name="stop_order[]" min="1"> </td>
                <td> <input type="time" name="arrival_time[]"> </td>
                <td> <input type="time" name="departure_time[]"> </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger deleteRow"><i class="icon-trash"></i></button>
                </td>
            </tr>

            `

                $('#routeTableBody').append(newRow)

            })
            $(document).on('click', '.deleteRow', function() {
                if ($('.deleteRow').length > 1) {
                    $(this).closest('tr').remove();
                } else {
                    alert('At Least One Row Must Remain')
                }
            })

            $('#stationName , #stationCode').on('keyup', function() {

                let name = $('#stationName').val();
                let code = $('#stationCode').val();


                $.ajax({
                    url: "{{ route('station.checkDuplicate') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        code: code,
                    },
                    success: function(response) {
                        if (response.nameExists == true) {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "This name is already taken",
                            });
                            $('#submitBtn').prop('disabled', true);
                            $('#stationCode').prop('readonly', true);

                        } else if (response.codeExists == true) {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "This code is already taken",
                            });
                            $('#submitBtn').prop('disabled', true);
                            $('#stationName').prop('readonly', true);


                        } else {
                            $('#submitBtn').prop('disabled', false);
                            $('#stationName').prop('readonly', false);
                            $('#stationCode').prop('readonly', false);


                        }
                    }
                });
            });


            $('#submitBtn').click(function(e) {

                e.preventDefault();

                let name = $('#stationName').val();
                let code = $('#stationCode').val();

                $.ajax({
                    url: "{{ route('station.store') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        code: code,
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Name Added Successfully",
                        });

                        $('.stationSelect').append(
                            `
                            <option value = "${response.station.id}" selected> ${response.station.name}  </option>

                            `
                        );

                        $('#stationName').val('');
                        $('#stationCode').val('');
                        $('#addStation').modal('hide');
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                });
            })

        });
    </script>
@endsection
