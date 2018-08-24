@extends('xaydung')
@section('meta')
@endsection
@section('content')
    @include('xaydung.partial.tinxaydung.slideNews')
    <section class="contentPage">
        <div class="container">
            <div class="container" id="exTab1">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#1a" data-toggle="tab">
                            @if(isset($key))
                                Nhà phố
                                @else
                                Nổi bật
                            @endif
                        </a></li>
                    <li><a href="#2a" data-toggle="tab">
                            @if(isset($key))
                                Căn hộ cao cấp
                            @else
                                Đã hoàn thành
                            @endif
                        </a></li>
                    <li><a href="#3a" data-toggle="tab">
                            @if(isset($key))
                                Đất nền
                            @else
                                Đang thi công
                            @endif
                        </a></li>
                    <li><a href="
                    @if(isset($key))
                        {{url('/bao-gia-bat-dong-san')}}
                                @else
                        {{url('/bao-gia-xay-dung')}}
                                @endif
                        ">Bao gia</a></li>
                </ul>
            </div>
            <div class="tab-content clearfix">
                <div class="tab-pane active" id="1a">
                    <div class="news-list">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="row">
                                    @if(!empty($thisNewNews))
                                        {!! $thisNewNews !!}
                                        @else
                                        <p>Chưa có nội dung</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="2a">
                    <div class="news-list">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="row">
                                    @if(!empty($thisHoanThanh))
                                        {!! $thisHoanThanh !!}
                                    @else
                                        <p>Chưa có nội dung</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="readmore"><a href="#">  Xem tat ca</a></div>
                </div>
                <div class="tab-pane" id="3a">
                    <div class="news-list">
                        <div class="container">
                            <div class="col-md-12">
                                    <div class="row">
                                        @if(!empty($thisDangThiCong))
                                            {!! $thisDangThiCong !!}
                                        @else
                                            <p>Chưa có nội dung</p>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="readmore"><a href="#">  Xem tat ca</a></div>
                </div>
                <div class="tab-pane" id="4a">
                    <h3>Nhap du lieu tu editor</h3>
                </div>
            </div>
        </div>
    </section>
@endsection