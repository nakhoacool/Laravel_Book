@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa chapter truyện</div>
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
                        <form method="POST" action="{{ route('chapter.update', $chapter->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="danhmuc" class="form-label">Tên chapter</label>
                                <input type="text" value="{{ $chapter->tieude }}" name="tieude" class="form-control"
                                    id="danhmuc" placeholder="Danh mục.....">
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label">Tag chapter</label>
                                <input type="text" value="{{ $chapter->tagchapter }}" name="tagchapter"
                                    class="form-control" id="tag" placeholder="Tag.....">
                            </div>

                            <div class="mb-3">
                                <label for="mota" class="form-label">Tóm tắt chapter</label>
                                <input type="text" value="{{ $chapter->tomtat }}" name="tomtat" class="form-control"
                                    id="mota" placeholder="Tóm tắt danh mục.....">
                            </div>
                            <div class="mb-3">
                                <label for="noidung" class="form-label">Nội dung chapter</label>
                                <textarea name="noidung" id="noidung" cols="30" rows="10" style="resize: none;"
                                    class="form-control">{{ $chapter->noidung }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="activate1" class="form-label">Thuộc truyện</label>
                                <select class="form-select" name="truyen_id" id="activate1">
                                    @foreach ($truyen as $item)
                                        <option {{ $chapter->truyen_id == $item->id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->tentruyen }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="activate" class="form-label">Kích hoạt</label>
                                <select class="form-select" name="kichhoat" id="activate">
                                    <option value="0" @if ($chapter->kichhoat == 0) selected @endif>Kích hoạt</option>
                                    <option value="1" @if ($chapter->kichhoat == 1) selected @endif>Không kích hoạt
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
