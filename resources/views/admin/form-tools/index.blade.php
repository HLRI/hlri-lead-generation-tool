@extends('admin.layout.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">List of registered sites</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="">To view the registered information for each site,
                                    click on "view info" link</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-end">
                    <a href="{{ route('form-tools.create') }}" class="btn btn-md btn-rounded btn-success">+ New Site</a>
                </div>
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
                                    <th scope="col">Url</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sites as $site)
                                    <tr>
                                        <th scope="row">{{ $site->id }}</th>
                                        <td>{{ $site->name }}</td>
                                        <td><a target="_blank" href="http://{{ $site->url }}">{{ $site->url }} <i class=" fas fa-external-link-alt"></i></a></td>
                                        <td>{{ $site->created_at }}</td>
                                        <td>
                                            <div class="d-flex flex-column align-items-start">
                                                <a href="{{ route('form-tools.show', ['token' => $site->token]) }}">View
                                                    Info</a>
                                                <a class="text-success" href="{{ route('form-tools.code', ['token' => $site->token]) }}">Tracking Code</a>
                                            </div>
                                        </td>
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
