@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa danh mục truyện</div>
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
                        <form method="POST" action="{{ route('danhmuc.update', $data->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="danhmuc" class="form-label">Tên danh mục</label>
                                <input type="text" value="{{ $data->tendanhmuc }}" name="tendanhmuc" class="form-control"
                                    id="danhmuc" placeholder="Danh mục.....">
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label">Tag danh mục</label>
                                <input type="text" value="{{ $data->tagdanhmuc }}" name="tagdanhmuc" class="form-control"
                                    id="tag" placeholder="Tag.....">
                            </div>
                            <div class="mb-3">
                                <label for="mota" class="form-label">Mô tả danh mục</label>
                                <input type="text" value="{{ $data->mota }}" name="mota" class="form-control" id="mota"
                                    placeholder="Mô tả danh mục.....">
                            </div>
                            <div class="mb-3">
                                <label for="activate" class="form-label">Kích hoạt</label>
                                <select class="form-select" name="kichhoat" id="activate">
                                    <option value="0" @if ($data->kichhoat == 0) selected @endif>Kích hoạt</option>
                                    <option value="1" @if ($data->kichhoat == 1) selected @endif>Không kích hoạt
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
