<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'truyen_id','tieude' ,'tomtat', 'noidung', 'kichhoat', 'tagchapter'
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter';
    public function truyen(){
        return $this->belongsTo('App\Models\truyen');
    }
}
