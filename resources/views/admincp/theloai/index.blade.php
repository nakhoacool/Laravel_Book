@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê thể loại</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên thể loại</th>
                                    <th scope="col">Tag</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Kích hoạt</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($danhmuc as $key => $dm)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $dm->tentheloai }}</td>
                                        <td>{{ $dm->tagtheloai }}</td>
                                        <td>{{ $dm->mota }}</td>
                                        <td>
                                            @if ($dm->kichhoat == 0)
                                                <span class="text text-success">Kích hoạt</span>
                                            @else
                                                <span class="text text-danger">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('theloai.edit', $dm->id) }}" class="btn btn-primary">Sửa</a>
                                            <form action="{{ route('theloai.destroy', $dm->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Bạn có muốn xóa?');" type="submit"
                                                    class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
