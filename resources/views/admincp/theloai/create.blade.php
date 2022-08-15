@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm thể loại</div>
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
                        <form method="POST" action="{{ route('theloai.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="danhmuc" class="form-label">Tên thể loại</label>
                                <input type="text" value="{{ old('tentheloai') }}" name="tentheloai" class="form-control"
                                    id="danhmuc" placeholder="Thể loại.....">
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label">Tag thể loại</label>
                                <input type="text" value="{{ old('tagtheloai') }}" name="tagtheloai" class="form-control"
                                    id="tag" placeholder="Tag.....">
                            </div>

                            <div class="mb-3">
                                <label for="mota" class="form-label">Mô tả thể loại</label>
                                <input type="text" value="{{ old('mota') }}" name="mota" class="form-control" id="mota"
                                    placeholder="Mô tả thể loại.....">
                            </div>
                            <div class="mb-3">
                                <label for="activate" class="form-label">Kích hoạt</label>
                                <select class="form-select" name="kichhoat" id="activate">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
