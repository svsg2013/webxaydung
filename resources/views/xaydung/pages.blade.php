@extends('xaydung')
@section('meta')
@endsection
@section('content')
    <section class="detail-box">
        <div class="container">
            <div class="detail-box__top">
                <h1>{{$getData->name}}</h1>
            </div>
            <div class="detail-box__content">
            {!! $getData->content !!}
            </div>
        </div>
    </section>
@endsection