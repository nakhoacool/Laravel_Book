@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật truyện</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('truyen.update', $truyen->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="truyen" class="form-label">Tên truyện</label>
                                <input type="text" value="{{ $truyen->tentruyen }}" name="tentruyen"
                                    class="form-control" id="truyen" placeholder="Truyện.....">
                            </div>
                            <div class="mb-3">
                                <label for="truyen" class="form-label">Tác giả</label>
                                <input type="text" value="{{ $truyen->tacgia }}" name="tacgia" class="form-control"
                                    id="truyen" placeholder="Tác giả....">
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label">Tag truyện</label>
                                <input type="text" value="{{ $truyen->tagtruyen }}" name="tagtruyen"
                                    class="form-control" id="tag" placeholder="Tag.....">
                            </div>

                            <div class="mb-3">
                                <label for="tomtat" class="form-label">Tóm tắt truyện</label>
                                <textarea name="tomtat" id="tomtat" class="form-control" rows="5"
                                    style="resize: none;">{{ $truyen->tomtat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="danhmuc" class="form-label">Danh mục truyện</label>
                                <select class="form-select" name="danhmuc" id="danhmuc">
                                    @foreach ($danhmuc as $dm)
                                        <option {{ $dm->id == $truyen->danhmuc_id ? 'selected' : '' }}
                                            value="{{ $dm->id }}">{{ $dm->tendanhmuc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="theloai" class="form-label">Thể loại truyện</label>
                                <select class="form-select" name="theloai" id="theloai">
                                    @foreach ($theloai as $dm)
                                        <option {{ $dm->id == $truyen->theloai_id ? 'selected' : '' }}
                                            value="{{ $dm->id }}">{{ $dm->tentheloai }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Hình ảnh truyện</label>
                                <input type="file" name="hinhanh" class="form-control-file" id="image">
                                <img src="{{ asset('uploads/truyen/' . $truyen->hinhanh) }}" height="200" width="200">
                            </div>
                            <div class="mb-3">
                                <label for="activate" class="form-label">Kích hoạt</label>
                                <select class="form-select" name="kichhoat" id="activate">
                                    <option value="0" @if ($truyen->kichhoat == 0) selected @endif>Kích hoạt</option>
                                    <option value="1" @if ($truyen->kichhoat == 1) selected @endif>Không kích hoạt
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
