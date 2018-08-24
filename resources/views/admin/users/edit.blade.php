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
                            {!! Form::open(['route' =>['user.update',$getUsers->id],'class'=>'form-horizontal','role'=>'form','method'=>'put','enctype'=>'multipart/form-data']) !!}
                            <div class="form-group">
                                {!! Form::label('Username','Username',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtUser',old('txtUser',isset($getUsers)?$getUsers->name:null),['placeholder'=>'To type here','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('input select','Input Select',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::select('slRoles', ['1' => 'Administrator', '2' => 'Moderator','3'=>'Editor'], $getUsers->lvl, ['placeholder' => 'Chọn chức vụ...','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('E-mail','E-mail',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtEmail',old('txtEmail',isset($getUsers)?$getUsers->email:null),['placeholder'=>'To type here if any','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Phone Number','Phone Number',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtPhone',old('txtPhone',isset($getUsers)?$getUsers->phone:null),['placeholder'=>'To type here if any','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Password','Password',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('txtPass',old('txtPass',isset($getUsers)?$getUsers->password:null),['placeholder'=>'To type here','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Check Roles','Check Roles',['class'=>'col-md-2 control-label']) !!}
                                <div class="col-md-10">
                                    <ul>
                                        @foreach($RolCheck as $getData)
                                                @php
                                                    $save='';
                                                    if (!empty($getData['chek'])){
                                                                    foreach ($getData['chek'] as $chk){
                                                                        if ($chk->role_id == $getData['id']){
                                                                            $save='checked';
                                                                        }
                                                                    }
                                                                }
                                                @endphp
                                            <li>{!! Form::checkbox('roles[]',$getData['id'],$save,['style'=>'visibility:visible']) !!} {{$getData['name']}}</li>
                                        @endforeach

                                    </ul>
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