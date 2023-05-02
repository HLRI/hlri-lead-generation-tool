@extends('admin.layout.index')

@section('css')
    <link rel="stylesheet" href="https://highlightjs.org/static/demo/styles/base16/material-darker.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/languages/go.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script>
        hljs.highlightAll();
        new ClipboardJS('.copy-code');
    </script>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tracking Code</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tracking code for <span class="badge py-2 px-3 rounded-pill text-bg-primary">{{$site->url}}</span> site</h5>
                        <button class="copy-code" data-clipboard-target="#code"><i class="far fa-copy"></i></button>
                        <pre><code class="language-html" id="code">&lt;script src=&quot;{{url('/form-tools') . '/' . $site->token}}&quot;&gt;&lt;/script&gt;</code></pre>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
