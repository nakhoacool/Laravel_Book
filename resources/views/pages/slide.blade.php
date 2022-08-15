        <h3>Sách hay nên đọc</h3>
        <div class="owl-carousel owl-theme mt-3 container">
            @foreach ($slide_truyen as $st)
                <div class='col'>
                    <div class="item"><img src="{{ asset('uploads/truyen/' . $st->hinhanh) }}">
                        <h5>{{ $st->tentruyen }}</h5>
                        <p><i class="fa-solid fa-eye"></i>2000</p>
                        <a href='{{ url('xem-truyen/' . $st->tagtruyen) }}' class='btn btn-danger btn-sm'>Đọc ngay</a>
                    </div>
                </div>
            @endforeach
        </div>
