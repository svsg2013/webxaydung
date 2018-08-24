@if(!empty($banner->metaName))
    <section class="bannerNew">
        <div class="bannerNew__image" style="background-image: url({{asset('upload/thumbnail/'.$banner->metaName)}})">
            <img src="{{asset('upload/thumbnail/'.$banner->metaName)}}" alt="">
        </div>
    </section>
@else
    <section class="bannerNew">
        <div class="bannerNew__image" style="background-image: url({{asset('upload/thumbnail/quy-trinh-thiet-ke.jpg')}})">
            <img src="{{asset('upload/thumbnail/quy-trinh-thiet-ke.jpg')}}" alt="">
        </div>
    </section>
@endif