@extends('xaydung')
@section('content')
  <section class="listPost">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          {!! $thisSearch !!}
        </div>
        {{--<div class="col-lg-12">--}}
          {{--<div class="pagination">--}}
            {{--<ul class="clearfix" data-anim-type="fadeInUp" data-anim-delay="150">--}}
              {{--<li class="disabled show-mobile"><a aria-label="Previous"><i class="arrow_carrot-left"></i></a></li>--}}
              {{--<li class="active show-mobile"><a title="1">1</a></li>--}}
              {{--<li class="show-mobile"><a href="#">2</a></li>--}}
              {{--<li class="show-mobile"><a href="#">3</a></li>--}}
              {{--<li><a href="#">4</a></li>--}}
              {{--<li><a href="#">5</a></li>--}}
              {{--<li><a href="#">6</a></li>--}}
              {{--<li><a href="#">7</a></li>--}}
              {{--<li><a href="#">8</a></li>--}}
              {{--<li class="show-mobile"><a href="#" rel="next"><i class="arrow_carrot-right"></i></a></li>--}}
            {{--</ul>--}}
          {{--</div>--}}
        {{--</div>--}}
      </div>
    </div>
  </section>
@endsection