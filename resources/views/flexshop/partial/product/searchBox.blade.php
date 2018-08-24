<div class="box-search-inner">
    <p>Tìm kiếm</p>
    <form action="{{route('searchProd')}}" class="navbar-form navbar-search searchAjax">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a></a>
        <input type="text" name="txtSearchProd" placeholder="Tìm kiếm" class="search-query-inner">
        <button type="submit" class="btn icon-search-inner"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
</div>