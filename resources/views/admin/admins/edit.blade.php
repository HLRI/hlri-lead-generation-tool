@extends('admin.layout.index')

@section('style')
    <style>
        .imgupload {
            width: 100%;
            height: 100%;
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

        .limittextarea {
            max-width: 100%;
            min-width: 100%;
            height: 120px;
            max-height: 120px;
            min-height: 120px;
        }

    </style>
@endsection
@section('content')

    <section class="col-lg-12">

        @include('admin.partial.error')

        @if (session('admins-edit'))
            <div class="alert alert_success">
                <ul>
                    <li>{{ session('admins-edit') }}</li>
                </ul>
            </div>
        @endif


        <div style="display: flex;justify-content: space-between; align-items: center" class="header_title">
            ویرایش کاربر
            <a href="{{ url()->previous() }}">
                بازگشت
                <i class="fa fa-long-arrow-left"></i>
            </a>
        </div>

    </section>


    {!! Form::model($admin, ['method' => 'PATCH', 'action' => ['Admin\AdminController@update', $admin->id], 'files' => true]) !!}
    <section class="col-lg-9 connectedSortable">

        <div class="box">
            <div class="box-header">
                <i class="fa fa-edit"></i>

                <h3 class="box-title">ویرایش کاربر</h3>
            </div>
            <div class="box-body">
                <div class="row" style="padding: 0 15px">
                    <div class="col-sm-4">
                        <div class="form-group">
                                <label for="" class=" control-label">نام</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                                <label for="" class=" control-label">نام خانوادگی</label>
                                {!! Form::text('family', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('family'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('family') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                                <label for="" class=" control-label">نام کاربری</label>
                                {!! Form::text('username', null, ['class' => 'form-control']) !!}

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                                <label for="" class=" control-label">رمز عبور</label>
                                {!! Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'در صورت عدم تغییر ، این فیلد را خالی بگذارید']) !!}
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>سمت</label>
                            <select name="role" class="form-control show-tick">
                                <option value="">انتخاب کنید</option>
                                <option @if ($admin->user_type == 'مدیر') selected @endif value="مدیر">مدیر</option>
                                <option @if ($admin->user_type == 'اپراتور') selected @endif value="اپراتور">اپراتور</option>
                                <option @if ($admin->user_type == 'آشپز') selected @endif value="آشپز">آشپز
                                <option @if ($admin->user_type == 'پیک') selected @endif value="پیک">پیک
                                </option>
                            </select>
                            @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="" class=" control-label" style="margin-bottom: 16px">دسترسی ها</label>
                        <div class="form-group">
                            <div class="row" style="font-size: 12px">
                                @foreach ($menus as $item)

                                    @foreach ($admin->menus as $item2)
                                        @php
                                            if ($item->id == $item2->id) {
                                                $checked = 'checked';
                                            }
                                        @endphp
                                    @endforeach


                                    <div class="col-md-3">
                                        <input name="menu[]" value="{{ $item->id }}" type="checkbox"
                                            id="md_checkbox_{{ $item->id }}" class="filled-in chk-col-amber"
                                            {{ @$checked }}>
                                        <label for="md_checkbox_{{ $item->id }}">{{ $item->title }}</label>
                                    </div>

                                    @php
                                        $checked = '';
                                    @endphp

                                @endforeach
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>

    <section class="col-lg-3 connectedSortable">

        <div class="box">
            <div class="box-header">
                <i class="fa fa-list-alt"></i>

                <h3 class="box-title">وضعیت کاربر</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {{ Form::select('activated', ['0' => 'غیر فعال', '1' => 'فعال'], null, ['class' => 'form-control']) }}
                </div>

                <button type="submit" class="pull-left btn btn-block btn-success" id="sendEmail">ویرایش کاربر
                </button>
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <i class="fa fa-image"></i>

                <h3 class="box-title">تصویر شاخص</h3>
            </div>
            <div class="box-body">
                <div class="form-group" style="padding: 10px;height: 180px;max-height: 180px">
                    <label class="imgupload" onclick="filemanager.selectFile('profile-photo')">
                        <img style="max-height: 100%" class="img-responsive" id="profile-photo-preview"
                            src="{{ $admin->image }}" />
                    </label>
                    {{-- <input name="image" type="file" style="display: none" id="uploadimage"> --}}
                    <input name="image" type="hidden" id="profile-photo">

                </div>
            </div>
        </div>


    </section>
    {!! Form::close() !!}

@endsection

@section('script')


    <script>


        $(".imgupload").click(function() {
            $('#upimgtext').hide();
        });

    </script>
@endsection
