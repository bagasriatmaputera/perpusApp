<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengembalian extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'pengembalians';
    protected $primaryKey = 'id';
    protected $fillable = ['tgl_kembali','denda','pinjam_id'];

    public function pinjam(){
        return $this->belongsTo(Pinjam::class);
    }
}
