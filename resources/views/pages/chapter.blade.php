@extends('welcome')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ url('the-loai/' . $truyen_breadcrumb->theloai->tagtheloai) }}">{{ $truyen_breadcrumb->theloai->tentheloai }}</a>
            </li>
            <li class="breadcrumb-item"><a
                    href="{{ url('danh-muc/' . $truyen_breadcrumb->danhmuc->tagdanhmuc) }}">{{ $truyen_breadcrumb->danhmuc->tendanhmuc }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $truyen_breadcrumb->tentruyen }}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $chapter->truyen->tentruyen }}</h4>
            <p>Chương hiện tại: {{ $chapter->tieude }}</p>
            <div class='col-md-5'>
                <div class='form-group'>
                    <label for='exampleFormControlSelect1'>Chọn chương</label>
                    <select name="select-chapter" class="form-control select-chapter" id="exampleFormControlSelect1">
                        @foreach ($all_chapter as $chap)
                            <option value="{{ url('xem-chapter/' . $chap->tagchapter) }}">{{ $chap->tieude }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class='noidungchuong'>
                <p>{{ $chapter->noidung }}</p>
            </div>
        </div>
    @endsection
