<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chapter;
use App\Models\truyen;

class chaptercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = chapter::with('truyen')->orderBy('id','desc')->get();
        return view('admincp.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = truyen::orderBy('id','desc')->get();
        return view('admincp.chapter.create')->with(compact('truyen'));
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
            'tieude' => 'required|unique:chapter|max:255',
            'tagchapter' => 'required|unique:chapter|max:255',
            'tomtat' => 'required',
            'noidung' => 'required',
            'truyen_id' => 'required',
            'kichhoat' => 'required',
        ],
        [
            'tieude.required' => 'Tiêu đề không được để trống',
            'tieude.unique' => 'Tiêu đề đã tồn tại',
            'tieude.max' => 'Tiêu đề không được quá 255 ký tự',

            'tagchapter.unique' => 'Tag chapter đã tồn tại',
            'tagchapter.required' => 'Tag chapter không được để trống',
            
            'tomtat.required' => 'Tóm tắt không được để trống',
            'noidung.required' => 'Nội dung phải có',
        ]);
        $chapter = new chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->tagchapter = $data['tagchapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->noidung = $data['noidung'];

        $chapter->save();
        return redirect()->back()->with('status', 'Thêm chapter thành công');
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
        $chapter = chapter::find($id);
        $truyen = truyen::orderBy('id','desc')->get();
        return view('admincp.chapter.edit')->with(compact('truyen','chapter'));
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
            'tieude' => 'required|max:255',
            'tagchapter' => 'required|max:255',
            'tomtat' => 'required',
            'noidung' => 'required',
            'truyen_id' => 'required',
            'kichhoat' => 'required',
        ],
        [
            'tieude.required' => 'Tiêu đề không được để trống',
            'tieude.max' => 'Tiêu đề không được quá 255 ký tự',

            'tagchapter.required' => 'Tag chapter không được để trống',
            
            'tomtat.required' => 'Tóm tắt không được để trống',
            'noidung.required' => 'Nội dung phải có',
        ]);
        $chapter = chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->tagchapter = $data['tagchapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->noidung = $data['noidung'];

        $chapter->save();
        return redirect()->back()->with('status', 'Update chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa chapter thành công');
    }
}
