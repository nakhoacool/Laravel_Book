<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\truyen;
use App\Models\chapter;
use App\Models\theloai;

class IndexController extends Controller
{
    public function home(){
        $theloai = theloai::orderBy('id', 'desc')->get();
        $slide_truyen = truyen::orderBy('id', 'desc')->where('kichhoat',0)->take(8)->get();
        $danhmuc = danhmuc::orderBy('id', 'desc')->get();
        $truyen = truyen::orderBy('id', 'desc')->where('kichhoat',0)->get();
        return view('pages.home')->with(compact('danhmuc','truyen','theloai','slide_truyen'));
    }

    public function danhmuc($tag){
        $theloai = theloai::orderBy('id', 'desc')->get();
        $danhmuc = danhmuc::orderBy('id', 'desc')->get();

        $danhmuc_id = danhmuc::where('tagdanhmuc',$tag)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;

        $truyen = truyen::orderBy('id', 'desc')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','theloai'));
    }

    public function theloai($tag){
        $theloai = theloai::orderBy('id', 'desc')->get();
        $danhmuc = danhmuc::orderBy('id', 'desc')->get();

        $theloai_id = theloai::where('tagtheloai',$tag)->first();
        $tentheloai = $theloai_id->tentheloai;

        $truyen = truyen::orderBy('id', 'desc')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->get();
        return view('pages.theloai')->with(compact('danhmuc','truyen','tentheloai','theloai'));
    }

    public function xemtruyen($tag){
        $theloai = theloai::orderBy('id', 'desc')->get();
        $danhmuc = danhmuc::orderBy('id', 'desc')->get();
        $truyen = truyen::with('danhmuc','theloai')->where('tagtruyen',$tag)->where('kichhoat',0)->first();
        $chapter = chapter::with('truyen')->orderBy('id', 'asc')->where('truyen_id',$truyen->id)->get();
        $chapter_dau = chapter::with('truyen')->orderBy('id', 'asc')->where('truyen_id',$truyen->id)->first();
        $cungdanhmuc = truyen::with('danhmuc','theloai')->where('danhmuc_id',$truyen->danhmuc->id)->whereNotIn('id',[$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','chapter_dau','theloai','cungdanhmuc'));
    }

    public function xemchapter($tag){
        $theloai = theloai::orderBy('id', 'desc')->get();
        $danhmuc = danhmuc::orderBy('id', 'desc')->get();
        $truyen = chapter::where('tagchapter',$tag)->first();
        $chapter = chapter::with('truyen')->where('tagchapter',$tag)->where('truyen_id',$truyen->truyen_id)->first();
        $all_chapter = chapter::with('truyen')->orderBy('id', 'asc')->where('truyen_id',$truyen->truyen_id)->get();
        //breadcrumb
        $truyen_breadcrumb = truyen::with('danhmuc','theloai')->where('id',$truyen->truyen_id)->first();
        //endbreadcrumb
        return view('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','theloai','truyen_breadcrumb'));
    }

    public function timkiem(){
        $theloai = theloai::orderBy('id', 'desc')->get();
        $danhmuc = danhmuc::orderBy('id', 'desc')->get();
        $tukhoa = $_GET['tukhoa'];
        $truyen = truyen::with('danhmuc','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')->orwhere('tomtat','LIKE','%'.$tukhoa.'%')->orwhere('tacgia','LIKE','%'.$tukhoa.'%')->GET();
        return view('pages.timkiem')->with(compact('danhmuc','truyen','theloai','tukhoa'));
    }
}
