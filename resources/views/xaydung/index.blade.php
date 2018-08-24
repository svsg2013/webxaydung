@extends('xaydung')
@section('meta')
@endsection
@section('content')
    <section class="sliderBanner">
        @if(!empty($thisSlider) || isset($thisSlider))
            {!! $thisSlider !!}
            @else
            <div class="sliderBanner__item">
                <div class="sliderBanner__item__image"><a href="#" style="background-image: url({{asset('uploads/sliders/sample.jpg')}});"><img src="{{asset('uploads/sliders/sample.jpg')}}" alt="Slider 1"></a></div>
                <div class="sliderBanner__item__title">
                    <h1><span>   Chưa có</span><span>  Slider</span></h1>
                </div>
            </div>
            @endif
    </section>
@endsection