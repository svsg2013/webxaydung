@extends('flexshop')
@section('meta')
    <base href="{{url('/')}}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name=viewport content="user-scalable=no,width=device-width,maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('upload/logo.png')}}"/>
    <title>Nhà xinh 360 | Liên hệ</title>
    <script type="text/javascript" src="{{asset('admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}"/>
    <script type="text/javascript" src="{{asset('views/template/src/bootstrap.minb09c.js')}}"></script>
    <link
            href="{{asset('views/template/src/bootstrap.minb09cb09c.css?v=180')}}"
            rel='stylesheet'
            type='text/css'
            media='all'/>
    <script
            defer="defer"
            type="text/javascript"
            src="{{asset('admin/plugins/nprogress/nprogress.js')}}"></script>
    <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('admin/plugins/nprogress/nprogress.css')}}"/>
    <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('admin/plugins/bootstrap-dropdown/css/animate.min.css')}}"/>
    <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('admin/plugins/bootstrap-dropdown/css/bootstrap-dropdownhover.min.css')}}"/>
    <script
            defer="defer"
            type="text/javascript"
            src="{{asset('admin/plugins/bootstrap-dropdown/js/bootstrap-dropdownhover.min.js')}}"></script>
    <script defer="defer" type="text/javascript" src="{{asset('admin/plugins/wow/wow.min.js')}}"></script>
    <script defer="defer" type="text/javascript" src="{{asset('admin/assets/js/custom.js')}}"></script>
    <link
            href="{{asset('views/template/src/filecssb09cb09c.css?v=180')}}"
            rel='stylesheet'
            type='text/css'
            media='all'/>
    <link
            href="{{asset('views/template/src/owl.carouselb09cb09c.css?v=180')}}"
            rel='stylesheet'
            type='text/css'
            media='all'/>
    <link
            href="{{asset('views/template/src/dq.scssb09cb09c.css?v=180')}}"
            rel='stylesheet'
            type='text/css'
            media='all'/>
    <link
            href="{{asset('views/template/src/font-awesomeb09cb09c.css?v=180')}}"
            rel='stylesheet'
            type='text/css'
            media='all'/>
    <link
            href="{{asset('views/template/src/jquery.fancyboxb09cb09c.css?v=180')}}"
            rel='stylesheet'
            type='text/css'
            media='all'/>
    <link
            href="{{asset('views/template/src/styleb09cb09c.css?v=180')}}"
            rel='stylesheet'
            type='text/css'
            media='all'/>
    <link
            href='https://fonts.googleapis.com/css?family=Poppins:400,700,500,600'
            rel='stylesheet'
            type='text/css'>
@endsection
@section('content')
    <div class="contentAjax">
        @include('flexshop.partial.bannerTop')
        <section class="introdutionPage" style="background-image:url('{{asset('upload/'.$system->bgContact)}}')">
            <div class="container">
                <div class="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><a href="{{route('homePage')}}" data-name="trang-chu" data-title="Trang chủ"  ><i class="fa fa-home"></i> Trang chủ</a><span class="divider"></span></li>
                        <li>Liên hệ</li>
                    </ul></div></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page_title">Liên hệ</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('putContact')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="contact_form">
                                <fieldset class="form-group">
                                    <label>Tên<span class="required">*</span></label>
                                    <input type="text" name="txtName"  placeholder="Tên của bạn" class="form-control">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="email" name="txtEmail" placeholder="Email của bạn" class="form-control">
                                </fieldset>
                                <div class="form-group">
                                    <label>Nội dung<span class="required">*</span></label>
                                    <textarea rows="3" name="txtContent" class="form-control"></textarea>
                                </div>
                                <p class="form-group">
                                    <button class="btn btn_button" type="submit">Gửi liên hệ</button>
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="location">
                            <address>
                                <strong></strong><br>
                                {{$system->address}}<br>
                                <abbr title="Phone">Điện thoại:</abbr>{{$system->phone}}<br>
                                Email: <a href="mailto:{{$system->email}}">{{$system->email}}</a>
                            </address>
                            <p>Nếu có thắc mắc hoặc cần trợ giúp, bạn có thể liên hệ với chúng tôi bất cứ lúc nào!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
            .contact-info .shop-name .icon {
                float: left;
                height: 45px;
                width: 35px;
                background: url({{asset('views/template/hstatic.net/581/1000123581/1000171890/icon_shopb09cb09c.png?v=180')}}) no-repeat 0px 0px/35px;
                margin-right: 9px;
                margin-top: 5px;
            }
        </style>
        @include('flexshop.partial.footerMap')
    </div>
@endsection