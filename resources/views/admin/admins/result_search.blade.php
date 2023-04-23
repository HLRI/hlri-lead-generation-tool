@extends('admin.layout.index')

@section('style')
    <style>
        .imgupload {
            width: 100%;
            height: 100px;
            border: 2px dashed #ccc;
            color: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border-radius: 6px
        }

        .imgupload:hover {
            background: #35454c;
        }

        .header_title {
            font-size: 18px;
            border-right: 4px solid #1b9d7c;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: rgb(228 228 228) 0px 2px 2px;
            background: #ffffff;
            color: rgb(112, 112, 112);
        }

        .box {
            background: #ffffff;
            border-top: 3px solid #1b9d7c;
        }

        .box-title {
            font-size: 14px !important;
        }

        .box-header {
            color: #1b9d7c;
        }

        .box-body>.table {
            font-size: 11px;
            text-align: center;
        }

        thead>tr>th {
            text-align: center;
        }

        thead {
            background: #1b9d7c;
            color: #fff;
        }

        .btn.active.focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn:active:focus,
        .btn:focus {
            outline: unset;
        }

        .fs8 {
            font-size: 8px;
        }

    </style>
@endsection
@section('content')
    <section class="col-lg-12">

        @if (session('error_choice'))
            <div class="alert alert_danger">
                <ul>
                    <li>{{ session('error_choice') }}</li>
                </ul>
            </div>
        @endif

        @if (session('delete_success'))
            <div class="alert alert_success">
                <ul>
                    <li>{{ session('delete_success') }}</li>
                </ul>
            </div>
        @endif

    </section>
    <section class="col-lg-12">
            <div style="display: flex;justify-content: space-between; align-items: center" class="header_title">
                نتایج جستجو
                <a href="{{ url()->previous() }}">
                    بازگشت
                    <i class="fa fa-long-arrow-left"></i>
                </a>
            </div>
    </section>
    <section class="col-lg-12 connectedSortable">
        <div class="box">
            <div class="box-body table-responsive ">
                <table class="table table-hover  table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 20px"><input type="checkbox" name="" id="choice_all"></th>
                            <th style="width: 60px">شناسه</th>
                            {{-- <th style="width: 80px">تصویر</th> --}}
                            <th>نام و نام خانوادگی</th>
                            <th>سمت</th>
                            <th>زمان ثبت</th>
                            <th>زمان بروزرسانی</th>
                            <th>وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        {!! Form::open(['method' => 'POST', 'action' => ['Admin\AdminController@all_destroy'], 'style' => 'display:unset', 'id' => 'choice_all_form']) !!}

                        @foreach ($admins as $item)
                            <tr>
                                <td><input type="checkbox" name="items[]" value="{{ $item->id }}"></td>

                                <td>{{ $item->id }}</td>
                                {{-- <td align="center"><img style="width: 60px;height: 50px;" src="{{ $item->image }}"
                                        class="img-responsive"></td> --}}
                                <td>
                                    <div>
                                        {{ $item->name . ' ' . $item->family }}
                                    </div>
                                    @if (Auth::guard('admin')->user()->role == 0)

                                    <small>

                                        <div style="margin-top: 8px;">
                                            <span style="margin-left: 6px;"><a class="btn fs8 btn-success btn-xs"
                                                    href="{{ route('admins.edit', $item->id) }}">ویرایش</a></span>
                                            {{-- {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\AdminController@destroy', $item->id], 'style' => 'display:unset']) !!} --}}
                                            <a href="{{ route('admins.delete', $item->id) }}"
                                                class="btn fs8 btn-danger btn-xs">حذف</a>
                                            {{-- {!! Form::close() !!} --}}
                                        </div>
                                    </small>
                                    @endif
                                </td>
                                <td>{{ $item->user_type }}</td>
                                <td>{{ Verta((string) $item->created_at)->format('Y/m/d - H:i:s') }}</td>
                                <td>{{ Verta((string) $item->updated_at)->format('Y/m/d - H:i:s') }}</td>
                                @if ($item->activated == 1)
                                    <td><span class="label label-success">فعال</span></td>
                                @else
                                    <td><span class="label label-warning">غیر فعال</span></td>
                                @endif
                            </tr>
                        @endforeach

                        {!! Form::close() !!}
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="row" align="center" dir="ltr">
        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {{ $admins->links() }}
        </section>
    </div>

@endsection

@section('script')

@endsection
