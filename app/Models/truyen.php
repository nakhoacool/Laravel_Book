<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truyen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tentruyen','tomtat' ,'danhmuc_id', 'hinhanh', 'tagtruyen', 'kichhoat', 'tacgia', 'theloai_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';
    public function danhmuc(){
        return $this->belongsTo('App\Models\danhmuc','danhmuc_id','id');
    }
    public function chapter(){
        return $this->hasMany('App\Models\chapter','truyen_id','id');
    }

    public function theloai(){
        return $this->belongsTo('App\Models\theloai','theloai_id','id');
    }
}
