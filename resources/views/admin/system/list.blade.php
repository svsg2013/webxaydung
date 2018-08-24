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
                            {!! Form::open(['route' => ['system.update',$dataSystem->id],'class'=>'form-horizontal','method'=>'put','role'=>'form','enctype'=>'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('title','Địa chỉ',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtAddress',old('txtAdress',isset($dataSystem->address)?$dataSystem->address:null),['placeholder'=>'To type here','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Meta Title','Điện thoại / Hotline',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtPhone',old('txtPhone',isset($dataSystem->phone)?$dataSystem->phone:null),['placeholder'=>'To type here if any','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Meta Description','Thông tin chân trang',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtFooter',old('txtFooter',isset($dataSystem->info)?$dataSystem->info:null),['placeholder'=>'To type here if any','class'=>'form-control','rows'=>5]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Meta Description','E-mail',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtEmail',old('txtEmail',isset($dataSystem->email)?$dataSystem->email:null),['placeholder'=>'To type here if any','class'=>'form-control','rows'=>5]) !!}
                                </div>
                            </div>
                            <!-- google -->
                            <div class="form-group">
                                {!! Form::label('Meta Description','Google Analytics',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('txtAna',old('txtAna',isset($dataSystem->analytic)?$dataSystem->analytic:null),['placeholder'=>'To type here if any','class'=>'form-control','rows'=>5]) !!}
                                </div>
                            </div>
                            <!-- facebooke -->
                            <div class="form-group">
                                {!! Form::label('Meta Description','Live chat',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('txtLivechat',old('txtLivechat',isset($dataSystem->livechat)?$dataSystem->livechat:null),['placeholder'=>'Input but iframe here','class'=>'form-control','rows'=>5]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Thumbnail','Logo',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::file('fileImg',['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Image','Image',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    <img src="{{asset('uploads/thumbnail/'.$dataSystem->logo)}}" class="img-rounded" width="300">
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(' ',' ',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::button('Cập nhật',['class'=>'btn btn-custom waves-effect waves-light btn-md','type'=>'submit']) !!}
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
    <script src="{{asset('backend/plugins/jquery.filer/js/jquery.filer.min.js')}}"></script>
    <!-- Bootstrap fileupload js -->
    <script src="{{asset('backend/plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    <!-- page specific js -->
    <script src="{{asset('backend/pages/jquery.fileuploads.init.js')}}"></script>
@endsection