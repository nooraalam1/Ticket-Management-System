@extends('admin.partials.app')
@section('title', 'Stations')
@section('content')
    <x-alerts />
    <div>
        <div class="mb-3 border-top-1 border-top-primary">
            <div class="page-header page-header-light"
                style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <div class="breadcrumb ml-0 mb-1">
                            <h5 class="breadcrumb-item py-0">Seats</h5>
                            {{-- <a href="components_breadcrumbs.html" class="breadcrumb-item py-0">View</a> --}}
                            <h5 class="breadcrumb-item py-0 active">View</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('seat.create') }}" class="btn-lg btn-info">Add Seat</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="d-flex justify-content-center" style="gap: 10px">
                <h2 class="">Select a coach to see seats:</h2>
                <select name="coach" id="coach" class="form-control select select2 col-2">
                    <option value="">Select Coach</option>
                    @foreach ($coaches as $coach)
                        <option value="{{$coach->id}}">{{$coach->name}}</option>
                    @endforeach
                </select>
            </div>
            <h3 class="text-center">Seats for Coach: <span id="addCoachName"></span></h3>
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Seat Number</th>
                            <th>Seat Type</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#coach").on('change', function () {
                var id = $(this).val();

                $.ajax({
                    url: '/coach-name/' + id,
                    type: 'GET',
                    success: function (response) {
                        $('#addCoachName').text(response.coach.name);
                        let x = response.coach.seats;
                        $("#tbody").html('')
                        x.forEach(function(data,index){
                            let row =
                            `
                                <tr>
                                    <td>${index+1}</td>
                                    <td>${data.seat_number}</td>
                                    <td>${data.seat_type}</td>
                                    <td class="d-flex align-items-center" style="gap:10px">
                                        <a href="/admin/seat/edit/${data.id}"
                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="/admin/seat/delete/${data.id}" action="POST">
                                            @csrf
                                            <button
                                                class="btn btn-sm btn-outline bg-pink-400 text-pink-400 border-pink-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            `
                            $("#tbody").append(row);
                        });
                    }
                })
            })
        })
    </script>
@endsection
