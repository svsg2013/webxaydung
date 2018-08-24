<div class="col-xs-12 col-sm-4 col-md-3">
    <div class="col-post">
        <div class="header-title">
            <h3 class="modtitle"><span>Danh mục</span>&nbsp;<span>Dự Án</span></h3>
        </div>
        <ul class="post-menu">
            @if(!empty($thisCateHere))
                {!! $thisCateHere !!}
                @else
                <li class="cat-item"><a href="{{route('homePage')}}" data-name="trang-chu" data-title="Trang chủ">Chưa có danh mục Dự án</a></li>
                @endif
        </ul>
    </div>
    <div class="col-post">
        <h3>Dự án nổi bật</h3>
        <ul class="post-menu">
            @if(!empty($thisHot))
                {!! $thisHot !!}
                @else
                <li><a href="javascript:void(0)">Chưa có Dự án nổi bật</a></li>
            @endif
        </ul>
    </div>
    @include('flexshop.partial.project.bannerLeft')
</div>