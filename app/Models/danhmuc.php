<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tendanhmuc','tagdanhmuc' ,'mota', 'kichhoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc';

    public function truyen(){
        return $this->hasMany('App\Models\truyen');
    }
}
