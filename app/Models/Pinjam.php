<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pinjam extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table = 'pinjams';
    protected $primaryKey = 'id';
    protected $fillable = ['tgl_pinjam', 'tgl_kembali', 'status', 'buku_id', 'user_id', 'tgl_dikembalikan'];

    public function hitungDenda()
    {
        $tanggalPengembalian = Carbon::parse($this->tgl_kembali);
        $tanggalDikembalikan = Carbon::parse($this->tgl_dikembalikan ?? now());

        $selisih = $tanggalDikembalikan->diffInDays($tanggalPengembalian, false);

        $dendaHarian = 1500;

        return $selisih < 0 ? abs($selisih) * $dendaHarian : 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
