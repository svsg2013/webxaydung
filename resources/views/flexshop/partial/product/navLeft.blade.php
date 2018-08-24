<div class="col-xs-12 col-sm-4 col-md-3">
    <div class=" left-menu">
        @include('flexshop.partial.product.searchBox')
        @if(!empty($flag))
            {{null}}
            @else
            <div class="box-colection">
                <div class="title-collection-menu-l">Danh mục</div>
                <ul class="list-collections list-cate-banner list-index">
                    @if(!empty($thisCateProduct))
                        {!! $thisCateProduct !!}
                    @else
                        <li class="menu_lv1 item-sub-cat"><a href="javascript:void(0)" ><i class="fa fa-angle-double-right" aria-hidden="true"></i> Chưa có danh sách</a></li>
                    @endif
                </ul>
            </div>
        @endif
    </div>
    @include('flexshop.partial.product.bannerLeft')
</div>