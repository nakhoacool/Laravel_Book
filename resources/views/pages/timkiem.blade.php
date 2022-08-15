@extends('welcome')


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
        </ol>
    </nav>
    <h3>Bạn tìm kiếm với từ khóa: {{$tukhoa}}</h3>
    <div class="album py-5 ">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 py-2">
                @php
                    $count = count($truyen);
                @endphp
                @if ($count == 0)
                    <p>Truyện không tìm thấy....</p>
                @else
                    @foreach ($truyen as $sach)
                        <div class="col-md-3">
                            <div class="card-mb-3 shadow-sm">
                                <img src="{{ asset('uploads/truyen/' . $sach->hinhanh) }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h3 class="card-text">{{ $sach->tentruyen }}</h3>
                                    <p class="card-text">{{ $sach->tomtat }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href='{{ url('xem-truyen/' . $sach->tagtruyen) }}'
                                                class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                        </div>
                                        <small class="text-muted"><i class="fa-solid fa-eye"></i>2000</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection
