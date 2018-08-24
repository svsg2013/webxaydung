<nav class="navbar menumain visible-xs mobile-menu">
    <div class="navbar-header">
        <button
                type="button"
                class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a title="" href="{{route('homePage')}}" class="navbar-brand">
            <img alt="" src="{{asset('upload/'.$system->logo)}}"></a>
    </div>
    <div class="navbar-collapse collapse navbar-left">
        <ul class="nav navbar-nav list-collections list-cate-banner navAjax">
            <li class="menu_lv1 item-sub-cat">
                <a href="{{route('homePage')}}">
                    Trang chủ</a>
            </li>
            <li class="menu_lv1 item-sub-cat">
                <a href="{{url('nha-xinh/gioi-thieu')}}" data-name="gioi-thieu" data-title="Giới thiệu">Giới thiệu</a>
            </li>
            <li class="menu_lv1 item-sub-cat">
                <a href="{{route('listProjects')}}" data-name="san-pham" data-title="Sản phẩm">Dự án
                    <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                </a>
            </li>
            <li class="menu_lv1 item-sub-cat">
                <a href="{{route('listDesign')}}" data-name="san-pham" data-title="Sản phẩm">Thiết kế nội thất
                    <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                </a>
            </li>
            <li class="menu_lv1 item-sub-cat">
                <a href="{{route('getListProduct')}}" data-name="san-pham" data-title="Sản phẩm">
                    Sản phẩm</a>
            </li>
            <li class="menu_lv1 item-sub-cat">
                <a href="{{route('contactShow')}}" data-name="lien-he" data-title="Liên hệ">Liên hệ</a>
            </li>
            <li class="menu_lv1 item-sub-cat">
                <a href="{{route('baogia')}}" data-name="lien-he" data-title="Liên hệ">Báo giá</a>
            </li>
            <li class="menu_lv1 item-sub-cat">
                <a href="{{route('tuyendung')}}" data-name="lien-he" data-title="Liên hệ">Tuyển dụng</a>
            </li>
        </ul>
    </div>
    <div class="hotline-menu">
        <h3>Hotline: {{$system->phone}} </h3></div>
    <form
            action="#"
            method="post"
            class="navbar-form navbar-search navbar-right hidden-md hidden-lg hidden-sm"
            id="search_mini_form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input
                id="search"
                name="txtSearch"
                placeholder="Tìm kiếm.."
                class="search-query"
                maxlength="128"
                type="text">
        <button type="submit" class="btn icon-search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </form>
</nav>
<div class="hidden-xs header
@if(!empty($flagIndex))
{{'header addIndex fixmenu'}}
@else
{{'header addBanner'}}
@endif
">
    <div class=" container">
        <nav class="navbar menumain">
            <div class="navbar-header">
                <button
                        type="button"
                        class="navbar-toggle"
                        data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="navbar-collapse collapse navbar-left">
                <div class="hotline clearfix">
                    <a title="" href="{{route('homePage')}}" class="navbar-brand">
                        <img alt="" src="{{asset('upload/'.$system->logo)}}">
                    </a>
                    <h3><span>Hotline: </span><span>{{$system->phone}}</span></h3>
                    <form action="{{route('multiSearch')}}"
                          class="navbar-form navbar-search navbar-right hidden-xs searchAjax">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input
                                name="txtSearch"
                                placeholder="Nhập thông tin cần tìm kiếm tại đây"
                                class="search-query"
                                maxlength="128"
                                type="text">
                        <button type="submit" class="btn icon-search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
                <ul class="nav navbar-nav navAjax">
                    <li>
                        <a href="{{route('homePage')}}">Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{url('nha-xinh/gioi-thieu')}}" data-name="gioi-thieu" data-title="Giới thiệu">Giới thiệu</a>
                    </li>
                    <li class="dropdown project">
                        <a href="{{route('listProjects')}}"> Dự án
                            <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu sub1">
                            <div class="col-xs-12 col-sm-12">
                                <div class="row">
                                    {!!$thisCateProject!!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </ul>
                    </li>
                    <li class="dropdown ">
                        <a href="{{route('listDesign')}}" data-name="san-pham" data-title="Sản phẩm">Thiết kế nội thất
                            <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu sub1">
                            <div class="col-xs-12 col-sm-12">
                                <div class="row">
                                    {!! $thisDesign !!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </ul>
                    </li>
                    <li class="dropdown ">
                        <a href="{{route('getListProduct')}}" data-name="san-pham" data-title="Sản phẩm">Sản phẩm
                            <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu sub1">
                            <div class="col-xs-12 col-sm-12">
                                <div class="row">
                                    @if(!empty($thisCateDrop))
                                        {!! $thisCateDrop !!}
                                        @else
                                        <p>{{null}}</p>
                                    @endif
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown project">
                        <a href="javascript:void(0)" data-name="san-pham"> Báo giá
                            <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu sub1">
                            <div class="col-xs-12 col-sm-12">
                                <div class="row">
                                    {!!$thisBaogia!!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('tuyendung')}}" data-name="lien-he" data-title="Liên hệ">Tuyển dụng</a>
                    </li>
                    <li>
                        <a href="{{route('contactShow')}}" data-name="lien-he" data-title="Liên hệ">Liên Hệ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>