@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade in fadeout" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('thongbao'))
    <div class="alert alert-success alert-dismissible fade in fadeout" role="alert">
        <strong>{{session('thongbao')}}</strong> successfully!
    </div>
@endif
@if(session('thongbaoloi'))
    <div class="alert alert-danger alert-dismissible fade in fadeout" role="alert">
        <strong>{{session('thongbaoloi')}}</strong>, phải xóa hết mục con
    </div>
@endif


