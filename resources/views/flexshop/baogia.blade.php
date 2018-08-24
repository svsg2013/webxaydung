@extends('flexshop')
@section('meta')
    <base href="{{url('/')}}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name=viewport content="user-scalable=no,width=device-width,maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('upload/logo.png')}}"/>
    <title>Nhà xinh 360 | Giới Thiệu</title>
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
    <div id="fb-root"></div>
    <address class="vcard" style="display:none">
        <img src='{{asset('upload/logo.png')}}' title='Flexshop' alt='Flexshop' class="photo"/>
        <a class="url fn" href="index.html">Flexshop</a>
        <div class="org">Flexshop Co, Ltd</div>
        <div class="adr">
            <div class="street-address">68/1D Chu Văn An. phường 26, quận Bình Thạnh</div>
            <span class="locality">Ho Chi Minh</span>,
            <span class="region">Binh Thanh</span>
            <span class="postal-code">70000</span>
        </div>
        <div class="tel">0934 154 886</div>
    </address>
    <div itemtype="http://schema.org/website ">
        <div itemtype="http://schema.org/website" itemscope="">
            <div>
                        <span itemprop="keywords">
                            <a rel="tag" href="index.html"></a>
                        </span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="contentAjax">
        <section style="background:#fff">
            <div class="container">
                <div class="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><a href="{{route('homePage')}}" data-name="trang-chu" data-title="Trang chủ"><i
                                        class="fa fa-home"></i> Trang chủ</a><span class="divider"></span></li>
                        <li>Báo giá</li>
                    </ul>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page_title">Báo giá</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="map" class="contact_map"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>Đang chờ cập nhật dữ liệu</h2>
                </div>
                <div class="col-md-6">
                    <div class="location">
                        <address>
                            <strong></strong><br>
                            134/79 Nguyễn Văn Linh, ấp 1, phường Bình Hưng, huyện Bình Chánh, TPHCM<br>
                            <abbr title="Phone">Điện thoại:</abbr> 0934 154 886<br>
                            Email: <a href="mailto:">info@nhaxinh360.vn</a>
                        </address>
                        <p>Nếu có thắc mắc hoặc cần trợ giúp, bạn có thể liên hệ với chúng tôi bất cứ lúc nào!</p>
                    </div>
                </div>
            </div>
        </div>

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
    </div>
@endsection