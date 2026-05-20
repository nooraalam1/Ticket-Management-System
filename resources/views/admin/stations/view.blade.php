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
                            <h5 class="breadcrumb-item py-0">Stations</h5>
                            {{-- <a href="components_breadcrumbs.html" class="breadcrumb-item py-0">View</a> --}}
                            <h5 class="breadcrumb-item py-0 active">View</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('station.create') }}" class="btn-lg btn-info">Add Station</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <table class="table datatable-button-html5-basic">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Station Name</th>
                        <th>Station Code</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($stations as $key => $station)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $station->name }}</td>
                            <td>{{ $station->code }}</td>
                            <td class="d-flex align-items-center" style="gap:10px">
                                <a href="{{ route('station.edit', ['id' => $station->id]) }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('station.delete', ['id' => $station->id]) }}" action="POST">
                                    @csrf
                                    <button
                                        class="btn btn-sm btn-outline bg-pink-400 text-pink-400 border-pink-400">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
