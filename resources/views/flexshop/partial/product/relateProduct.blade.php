<div class="block-sidebar-product">
    <div class="block-sidebar-product-title">
        <h2>Sản phẩm liên quan</h2>
    </div>
    <div class="block-sidebar-product-content">
        @if(!empty($thisRelate))
            {!! $thisRelate !!}
        @else
            <p style="margin-left: 10px">Không có sản phẩm liên quan</p>
        @endif
    </div>
</div>