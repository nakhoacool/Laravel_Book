<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;

class danhmuccontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = danhmuc::orderBy('id','desc')->get();
        return view('admincp.danhmuc.index')->with(compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.danhmuc.create');
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
            'tendanhmuc' => 'required|unique:danhmuc,tendanhmuc|max:255',
            'tagdanhmuc' => 'required|unique:danhmuc,tagdanhmuc|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
        ],
        [
            'tendanhmuc.required' => 'Tên danh mục không được để trống',
            'tendanhmuc.unique' => 'Tên danh mục đã tồn tại',
            'tendanhmuc.max' => 'Tên danh mục không được quá 255 ký tự',

            'tagdanhmuc.unique' => 'Tag danh mục đã tồn tại',
            'tagdanhmuc.required' => 'Tag danh mục không được để trống',
            'tagdanhmuc.max' => 'Tag danh mục không được quá 255 ký tự',
            
            'mota.required' => 'Mô tả danh mục không được để trống',
        ]);
        $danhmuctruyen = new danhmuc();
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->tagdanhmuc = $data['tagdanhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status', 'Thêm danh mục thành công');
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
        $data = danhmuc::find($id);
        return view('admincp.danhmuc.edit')->with(compact('data'));
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
            'tendanhmuc' => 'required|max:255',
            'tagdanhmuc' => 'required|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
        ],
        [
            'tendanhmuc.required' => 'Tên danh mục không được để trống',
            'tagdanhmuc.required' => 'Tag danh mục không được để trống',
            'mota.required' => 'Mô tả danh mục không được để trống',
        ]);
        $danhmuctruyen = danhmuc::find($id);
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->tagdanhmuc = $data['tagdanhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        danhmuc::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
