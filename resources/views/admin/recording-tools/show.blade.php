@extends('admin.layout.index')

@section('css')
<style>


 #screen {
        transform-origin: 0 0;
        border-top: 1.6rem solid #eee;
        border-right: 4px solid #eee;
        border-left: 4px solid #eee;
        border-bottom: .8rem solid #eee;
        padding: 0;
        border-radius: 10px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    }
</style>

@endsection

@section('js')
<script>
    var devicePixelRatio = {{ explode('/', $info->size)[2] }};
    var width = {{ explode('/', $info->size)[0] }};
    var height = {{ explode('/', $info->size)[1] }};
    var scale = devicePixelRatio / 2;

    document.getElementById('screen').style.transform = 'scale(' + scale + ')';
    document.getElementById('screen').style.width = (width) + 'px';
    document.getElementById('screen').style.height = (height) + 'px';
</script>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Session Recorded</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                    <div class="card-body">
                            <iframe id="screen" src="{{ route('changeUlrIframe', ['socket_id' => $info->session]) }}"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div
                                    style="display: flex;flex-direction: column; align-items: center;justify-content: center;gap: 5px;text-align: center">
                                    <div class="text-primary" style="font-size: 16px">Opration System</div>
                                    <div style="font-size: 18px;font-weight: bold;">{{ $info->os }}</div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div
                                    style="display: flex;flex-direction: column; align-items: center;justify-content: center;gap: 5px;text-align: center">
                                    <div class="text-primary" style="font-size: 16px">Platform</div>
                                    <div style="font-size: 18px;font-weight: bold;">{{ $info->device }}</div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div
                                    style="display: flex;flex-direction: column; align-items: center;justify-content: center;gap: 5px;text-align: center">
                                    <div class="text-primary" style="font-size: 16px">Screen</div>
                                    <div style="font-size: 18px;font-weight: bold;">
                                        {{ explode('/', $info->size)[0] . ' x ' . explode('/', $info->size)[1] }}</div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div
                                    style="display: flex;flex-direction: column; align-items: center;justify-content: center;gap: 5px;text-align: center">
                                    <div class="text-primary" style="font-size: 16px">Browser</div>
                                    <div style="font-size: 18px;font-weight: bold;">{{ $info->browser }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
