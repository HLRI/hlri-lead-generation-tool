@extends('admin.layout.index')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">List of Recorded Sessions</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="">...</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-end">
                    <a href="#" class="btn btn-md btn-rounded btn-success">+ New Site</a>
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
                                    <th scope="col">Id</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Session</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sites as $site)
                                    <tr>
                                        <td>{{ $site->id }}</td>
                                        <td><a target="_blank" href="http://{{ $site->url }}">{{ $site->url }} <i
                                                    class=" fas fa-external-link-alt"></i></a></td>
                                                    <td>{{ $site->session }}</td>
                                                    <td>{{ $site->created_at }}</td>

                                        <td>
                                            <div class="d-flex flex-column align-items-start">
                                                <a href="{{ route('recording-tools.show', ['session' => $site->session]) }}">View
                                                   Info</a>
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
