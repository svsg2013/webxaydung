@if(isset($banner))
    <section class="bannerNew">
        <div class="bannerNew__image" style="background-image: url({{asset('upload/thumbnail/'.$banner->description)}})">
            <img src="{{asset('upload/thumbnail/'.$banner->description)}}" alt="">
        </div>
    </section>
    @else
    <section class="bannerNew">
        <div class="bannerNew__image" style="background-image: url({{asset('upload/thumbnail/quy-trinh-thiet-ke.jpg')}})">
            <img src="{{asset('upload/thumbnail/quy-trinh-thiet-ke.jpg')}}" alt="">
        </div>
    </section>
@endif