<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'bukus';
    protected $primaryKey = 'id';
    protected $fillable = ['judul','penerbit','penulis','isbn','tahun','jumlah'];


    public function kategori():BelongsTo{
        return $this->belongsTo(kategori::class);
    }

    public function pinjam(){
        return $this->hasMany(Buku::class);
    }
}
