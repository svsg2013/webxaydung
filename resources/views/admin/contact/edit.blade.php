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
                            {!! Form::open(['route' => ['category.update',$catePaId->cateParen_id],'method'=>'put','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('title','Title',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtName',old('txtName',isset($catePaId)?$catePaId->name:null),['placeholder'=>'To type here','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">

                                {!! Form::label('input select','Input Select',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    <select class="form-control" name="slMenu">
                                        <option value="0">Select one</option>
                                        {{getMenu($datas,0,$char='|--',$catePaId->lvl)}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Meta Title','Meta Title',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtMeta',old('txtName',isset($catePaId)?$catePaId->metaName:null),['placeholder'=>'To type here if any','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Meta Description','Meta Description',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('txtDescription',old('txtName',isset($catePaId)?$catePaId->description:null),['placeholder'=>'To type here if any','class'=>'form-control','rows'=>5]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(' ',' ',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::button('Click me, Please!',['class'=>'btn btn-custom waves-effect waves-light btn-md','type'=>'submit']) !!}
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