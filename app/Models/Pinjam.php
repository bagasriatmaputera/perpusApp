<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pinjam extends Model
{
    //
    use HasFactory,SoftDeletes;

    protected $table = 'pinjams';
    protected $primaryKey = 'id';
    protected $fillable = ['tgl_pinjam','tgl_kembali','status','buku_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function buku(){
        return $this->belongsToMany(Buku::class);
    }
}
