@extends('template')
@section('title')
    Create news - @parent
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.partial.errors')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">
                            {!! Form::open(['route' => ['partner.update',$list->id],'method'=>'put','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('title','Tên*',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtName',old('txtName',isset($list->name)?$list->name:null),['placeholder'=>'Nhập tên Partner','class'=>'form-control']) !!}
                                </div>
                            </div>
                            {{--<div class="form-group">
                                {!! Form::label('title','Đường dẫn',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtSlug',old('txtSlug',isset($list->addSlug)?$list->addSlug:null),['placeholder'=>'Đường dẫn bài viết nếu có','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Thứ tự','Thứ tự',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtWeight',old('txtWeight',isset($list->weight)?$list->weight:1),['placeholder'=>'Ưu tiên số giảm dần, số lớn đứng đầu tiên','class'=>'form-control']) !!}
                                </div>
                            </div>--}}
                            <div class="form-group">
                                {!! Form::label('hinh-slider','Image (1170 x 450)',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::file('fileImg',['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('hinh-slider','Image',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    <img src="{{asset('upload/partner/'.$list->images)}}" style="width: 300px" />
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Ẩn hiện','Ẩn / Hiện',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::checkbox('checkActive',1,$list->active==1?true:null,['style'=>'visibility:visible']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(' ',' ',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::button('Gửi',['class'=>'btn btn-custom waves-effect waves-light btn-md','type'=>'submit']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('jsfiles')
    <!-- Jquery filer js -->
    <script src="{{asset('public/backend/plugins/jquery.filer/js/jquery.filer.min.js')}}"></script>
    <!-- Bootstrap fileupload js -->
    <script src="{{asset('public/backend/plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    <!-- page specific js -->
    <script src="{{asset('public/backend/pages/jquery.fileuploads.init.js')}}"></script>
@endsection