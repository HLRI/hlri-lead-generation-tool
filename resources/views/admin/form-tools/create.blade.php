@extends('admin.layout.index')

@section('css')
    <link rel="stylesheet" href="https://highlightjs.org/static/demo/styles/base16/material-darker.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/languages/go.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.copy-code');
    </script>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Register a new site</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-3">
                            <div class="form-group mb-4">
                                <input type="text" id="name" class="form-control" aria-describedby="name"
                                    placeholder="Name">
                                <small class="badge badge-default text-bg-info">Enter a name for this project
                                    (required)</small>
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" id="url" class="form-control" aria-describedby="Site-Url"
                                    placeholder="Site Url">
                                <small class="badge badge-default text-bg-info">Enter the site url without "http" or
                                    "www"</small>
                                <small class="badge badge-default text-bg-warning">Example : google.com</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-group">
                                    <button id="btn-form-tools" type="button" class="btn btn-success">Register</button>
                                </div>
                                <div id="loading" class="spinner-border text-success d-none" role="status">
                                </div>
                            </div>

                            <div id="errors" class="d-none">

                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your code</h5>
                        <button class="copy-code" data-clipboard-target="#code"><i class="far fa-copy"></i></button>
                        <pre><code class="language-html" id="code"></code></pre>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
