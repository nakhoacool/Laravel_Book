<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theloai;

class theloaicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = theloai::orderBy('id','desc')->get();
        return view('admincp.theloai.index')->with(compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.theloai.create');
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
            'tentheloai' => 'required|unique:theloai,tentheloai|max:255',
            'tagtheloai' => 'required|unique:theloai,tagtheloai|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
        ],
        [
            'tentheloai.required' => 'Tên thể loại không được để trống',
            'tentheloai.unique' => 'Tên thể loại đã tồn tại',
            'tentheloai.max' => 'Tên thể loại không được quá 255 ký tự',

            'tagtheloai.unique' => 'Tag thể loại đã tồn tại',
            'tagtheloai.required' => 'Tag thể loại không được để trống',
            'tagtheloai.max' => 'Tag thể loại không được quá 255 ký tự',
            
            'mota.required' => 'Mô tả thể loại không được để trống',
        ]);
        $theloai = new theloai();
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->tagtheloai = $data['tagtheloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        return redirect()->back()->with('status', 'Thêm thể loại thành công');
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
        $data = theloai::find($id);
        return view('admincp.theloai.edit')->with(compact('data'));
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
            'tentheloai' => 'required|unique:theloai,tentheloai|max:255',
            'tagtheloai' => 'required|unique:theloai,tagtheloai|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
        ],
        [
            'tentheloai.required' => 'Tên thể loại không được để trống',
            'tentheloai.unique' => 'Tên thể loại đã tồn tại',
            'tentheloai.max' => 'Tên thể loại không được quá 255 ký tự',

            'tagtheloai.unique' => 'Tag thể loại đã tồn tại',
            'tagtheloai.required' => 'Tag thể loại không được để trống',
            'tagtheloai.max' => 'Tag thể loại không được quá 255 ký tự',
            
            'mota.required' => 'Mô tả thể loại không được để trống',
        ]);
        $theloai = theloai::find($id);
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->tagtheloai = $data['tagtheloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        return redirect()->back()->with('status', 'Sửa thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        theloai::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
