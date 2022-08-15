<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\truyen;
use App\Models\theloai;

class truyencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = truyen::with('danhmuc','theloai')->orderBy('id','desc')->get();

        return view('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = theloai::orderBy('id','desc')->get();
        $danhmuc = danhmuc::orderBy('id','desc')->get();
        return view('admincp.truyen.create')->with(compact('danhmuc','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tentruyen' => 'required|unique:truyen|max:255',
            'tagtruyen' => 'required|unique:truyen|max:255',
            'tomtat' => 'required',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min-width=100,min-height=100,max-width=2000,max-height=2000',
            'danhmuc' => 'required',
            'tacgia' => 'required',
            'kichhoat' => 'required',
            'theloai' => 'required',
        ],
        [
            'tentruyen.required' => 'Tên truyện không được để trống',
            'tentruyen.unique' => 'Tên truyện đã tồn tại',
            'tentruyen.max' => 'Tên truyện không được quá 255 ký tự',

            'tagtruyen.unique' => 'Tag truyện đã tồn tại',
            'tagtruyen.required' => 'Tag truyện không được để trống',
            
            'tomtat.required' => 'Tóm tắt không được để trống',
            'tacgia.required' => 'Tác giả không được để trống',
            'hinhanh.required' => 'Hình ảnh phải có',
            'theloai.required' => 'Thể loại không được để trống',
        ]);
        $truyen = new truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tagtruyen = $data['tagtruyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->danhmuc_id = $data['danhmuc'];

        $get_image = $request->file('hinhanh');
        $path = 'uploads/truyen/';
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_image_name));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $truyen->hinhanh = $new_image;

        $truyen->save();
        return redirect()->back()->with('status', 'Thêm truyện thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truyen = truyen::find($id);
        $theloai = theloai::orderBy('id','desc')->get();
        $danhmuc = danhmuc::orderBy('id','desc')->get();
        return view('admincp.truyen.edit')->with(compact('truyen','danhmuc','theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tentruyen' => 'required|max:255',
            'tagtruyen' => 'required|max:255',
            'tomtat' => 'required',
            'hinhanh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min-width=100,min-height=100,max-width=1000,max-height=1000',
            'danhmuc' => 'required',
            'tacgia' => 'required',
            'kichhoat' => 'required',
            'theloai' => 'required',
        ],
        [
            'tentruyen.required' => 'Tên truyện không được để trống',
            'tentruyen.max' => 'Tên truyện không được quá 255 ký tự',

            'tagtruyen.unique' => 'Tag truyện đã tồn tại',
            
            'tomtat.required' => 'Tóm tắt không được để trống',
            'tacgia.required' => 'Tác giả không được để trống',
            'hinhanh.image' => 'Hình ảnh!!!',
            'hinhanh.mimes' => 'Hình ảnh phải có đuôi jpeg,png,jpg,gif,svg',
            'theloai.required' => 'Thể loại không được để trống',
        ]);
        $truyen = truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tagtruyen = $data['tagtruyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->theloai_id = $data['theloai'];

        $get_image = $request->file('hinhanh');
        if($get_image){
            $path = 'uploads/truyen/'.$truyen->hinhanh;
            if(file_exists($path)){
                unlink($path);
            }
            $path = 'uploads/truyen/';
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $truyen->hinhanh = $new_image;
        }
        $truyen->save();
        return redirect()->back()->with('status', 'Cập nhật truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = truyen::find($id);
        $path = 'uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }
        truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công');
    }
}
