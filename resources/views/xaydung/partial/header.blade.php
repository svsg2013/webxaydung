<header class="header">
    <div class="header__bottom">
        <div class="header__bottom__inner">
            <div class="header__bottom__logo"><a href="{{route('homePage')}}"><img src="{{(!empty($systemInfo->logo)||isset($systemInfo->logo)?asset('/uploads/thumbnail/'.$systemInfo->logo):null)}}" alt="{{$systemInfo->logo}}"></a></div>
            <div class="header__bottom__search">
                <form action="{{route('search')}}">
                    <div class="input-group">
                        <button type="submit" class="input-group-addon" id="basic-addon1" style="border: none">
                            <i class="icon_search"></i>
                        </button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="form-control" type="text" placeholder="Search" aria-describedby="basic-addon1" name="txtSearch">
                    </div>
                </form>

                </form>


            </div>
            <div class="header__bottom__menu">
                <div class="nav-click"></div>
                <div class="navigation">
                    <div class="nav">
                        <ul>
                            <li class="current" style="animation-delay: 0ms;"><a class="link-home current" data-name="home-page" href="/">Trang chủ</a></li>
                            <li style="animation-delay: 50ms;"><a class="link-load" data-name="about-page" href="{{route('tinxaydung')}}">Xây dựng</a></li>
                            <li style="animation-delay: 50ms;"><a class="link-load" data-name="about-page" href="#">Bất động sản</a></li>
                            <li style="animation-delay: 100ms;"><a class="link-load" data-name="customer-page" href="#">Bảo hiểm</a></li>
                            <li style="animation-delay: 150ms;"><a class="link-load" data-name="network-page" href="#">Giới thiệu chung</a></li>
                            <li style="animation-delay: 200ms;"><a class="link-load" data-name="client-page" href="#">Liên hệ ngay</a></li>
                            <li style="animation-delay: 300ms;"><a class="link-load" data-name="recruitment-page" href="#">Tuyển dụng</a></li>
                        </ul>
                    </div><span></span>
                </div>
            </div>
        </div>
    </div>
</header>