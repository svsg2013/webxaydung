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
                    {!! Form::open(['route' => ['news.update',$getPosts->id],'class'=>'form-horizontal','method'=>'put','role'=>'form','enctype'=>'multipart/form-data']) !!}
                    <div class="col-md-8">
                        <div class="p-20">

                            <div class="form-group">
                                {!! Form::label('title','Title *',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtName',old('txtName',isset($getPosts)?$getPosts->title:null),['placeholder'=>'To type here','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','SEO Title',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtMetatitle',old('txtName',isset($getPosts)?$getPosts->metaTitle:null),['placeholder'=>'To type here','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('input select','Input Select',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    <select class="form-control" name="slMenu">
                                        <option value="">Select one</option>
                                        {{cateMenu($getDataMenu,'|--',$getPosts->Cate_id)}}
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Summary','Summary *',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('txtSummary',old('txtName',isset($getPosts->summary)?$getPosts->summary:null),['placeholder'=>'To type here','class'=>'form-control','rows'=>5]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Summary','SEO Description',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('txtDescription',old('txtName',isset($getPosts->description)?$getPosts->description:null),['placeholder'=>'To type here','class'=>'form-control','rows'=>5]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Content','Content *',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::textarea('txtContent',old('txtName',isset($getPosts->content)?$getPosts->content:null),['class'=>'form-control','id'=>'editor1']) !!}
                                    <script>
                                        ckeditor('txtContent');
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Thumbnail','Thumbnail (368 x 246)',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::file('fileImg',['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Image','Image ',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    <img src="{{asset('upload/thumbnail/'.$getPosts->images)}}" class="img-rounded" alt="{{$getPosts->title}}" width="300">
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label(' ',' ',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::button('Submit',['class'=>'btn btn-custom waves-effect waves-light btn-md','type'=>'submit']) !!}
                                </div>
                            </div>

                        </div><!-----s----------->
                    </div><!--mid 8-->
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4">
                            {!! Form::label('Hot News') !!}
                                    <!-- Slide THREE -->
                                <div class="slideThree">
                                    <input type="checkbox" {{$getPosts->hot == 1?'checked':null}} value="1" id="slideThree" name="checkHot" />
                                    <label for="slideThree"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                            {!! Form::label('Feature News') !!}
                            <!-- Slide THREE -->
                                <div class="slideThree1">
                                    <input type="checkbox" {{$getPosts->feature == 1?'checked':null}} value="1" id="slideThree1" name="checkFeature" />
                                    <label for="slideThree1"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                            {!! Form::label('Active') !!}
                            <!-- Slide THREE -->
                                <div class="slideThree2">
                                    <input type="checkbox"  {{$getPosts->active == 1?'checked':null}} value="1" id="slideThree2" name="checkActive" />
                                    <label for="slideThree2"></label>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="cusWeight">
                                    {!! Form::label('The Weight post') !!}
                                    {!! Form::text('txtWeight',isset($getPosts->sort)?$getPosts->sort:null) !!}
                                </div>
                            </div>
                        </div><!--row-sigbar-right-->
                    </div>
                    {!! Form::close() !!}
                </div><!-- end row -->
            </div>


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
    <script>
        $( document ).ready(function(){
//   Hide the border by commenting out the variable below
            var $on = 'section';
            $($on).css({
                'background':'none',
                'border':'none',
                'box-shadow':'none'
            });
        });
    </script>

@endsection

