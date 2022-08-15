@extends('welcome')


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ url('danh-muc/' . $truyen->danhmuc->tagdanhmuc) }}">{{$truyen->danhmuc->tendanhmuc}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-9">
            <div class='row'>
                <div class="col-md-3"> <img src="{{ asset('uploads/truyen/' . $truyen->hinhanh) }}"
                        class="card-img-top" alt="..."></div>
                <div class="col-md-6">
                    <style>
                        .info-truyen {
                            list-style: none;
                        }

                    </style>
                    <ul class='info-truyen'>
                        <li>Tác giả: {{ $truyen->tacgia }}</li>
                        <li>Số chapter: {{ count($chapter) }}</li>
                        <li>Số lượt xem: 2000</li>
                        <li>Danh mục truyện:<a
                                href="{{ url('danh-muc/' . $truyen->danhmuc->tagdanhmuc) }}">{{ $truyen->danhmuc->tendanhmuc }}</a>
                        </li>
                        <li>Thể loại truyện:<a
                                href="{{ url('the-loai/' . $truyen->theloai->tagtheloai) }}">{{ $truyen->theloai->tentheloai }}</a>
                        </li>
                        @if ($chapter_dau)
                            <li><a href='{{ url('xem-chapter/' . $chapter_dau->tagchapter) }}' class='btn btn-primary'>Đọc
                                    online ngay!</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <p>{{ $truyen->tomtat }}</p>
            </div>
            <hr>
            <h4>Mục lục</h4>
            <ul class='mucluc-truyen'>
                @php
                    $mucluc = count($chapter);
                @endphp
                @if ($mucluc > 0)
                    @foreach ($chapter as $chap)
                        <li><a href='{{ url('xem-chapter/' . $chap->tagchapter) }}'>{{ $chap->tieude }}</a></li>
                    @endforeach
                @else
                    <li>Chưa có mục lục nào</li>
                @endif
            </ul>
        </div>
    </div>
@endsection
