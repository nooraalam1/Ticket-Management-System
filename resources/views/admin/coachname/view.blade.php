@extends('admin.partials.app')
@section('title', 'Coach Names')
@section('content')
    <x-alerts />
    <div>
        <div class="mb-3 border-top-1 border-top-primary">
            <div class="page-header page-header-light"
                style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <div class="breadcrumb ml-0 mb-1">
                            <h5 class="breadcrumb-item py-0">Coach Names</h5>
                            <h5 class="breadcrumb-item py-0 active">View</h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('coachname.create') }}" class="btn-lg btn-info">Add CoachName</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <table class="table datatable-button-html5-basic">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Coach Name</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($coachnames as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td class="d-flex align-items-center" style="gap:10px">
                                <a href="{{route('coachname.edit',['id'=>$data->id])}}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{route('coachname.delete',['id'=>$data->id])}}" action="POST">
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
