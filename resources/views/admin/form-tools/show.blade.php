@extends('admin.layout.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Information received from <span class="badge py-2 px-3 rounded-pill text-bg-primary">{{$site->url}}</span> site</h3>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($infos as $info)
                                    <tr>
                                        <th scope="row">{{ $info->id }}</th>
                                        <td>{{ $info->name }}</td>
                                        <td>{{ $info->email }}</td>
                                        <td>{{ $info->phone }}</td>
                                        <td>{{ $info->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
