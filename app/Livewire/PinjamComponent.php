<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\User;
use App\Models\Pinjam;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class PinjamComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $tgl_pinjam, $tgl_kembali, $status, $buku, $cari, $pinjam_id, $nama;
    public $member = null;
    public function render()
    {
        if ($this->cari != '') {
            $data['pinjam'] = Pinjam::with(['user', 'buku'])
                ->whereHas('user', function ($q) {
                    $q->where('nama', 'like', '%' . $this->cari . '%');
                })
                ->paginate(10);
        } else {
            $data['pinjam'] = Pinjam::with(['user', 'buku'])->paginate(10);
        }

        $data['book'] = Buku::with('pinjam')->get();
        $data['orang'] = User::with('pinjam')->where('jenis', 'member')->get();
        return view('livewire.pinjam-component', $data);
    }
    public function tambahPinjam()
    {
        $this->validate([
            'member' => 'required|exists:users,id',
            'buku' => 'required|exists:bukus,id'
        ], [
            'member.required' => 'Member wajib dipilih.',
            'member.exists' => 'Member tidak ditemukan.',

            'buku.required' => 'Buku wajib dipilih.',
            'buku.exists' => 'Buku tidak ditemukan.',
        ]);
        $now = date('Y-m-d');
        $tgl_kembali = date('Y-m-d', strtotime($now . '+7 day'));

        Pinjam::create([
            'user_id' => $this->member,
            'tgl_pinjam' => $now,
            'tgl_kembali' => $tgl_kembali,
            'status' => 'pinjam',
            'buku_id' => $this->buku
        ]);

        session()->flash('success', 'Berhasil tambah peminjam');
        $this->reset();
    }

    public function confirm($id)
    {
        $pinjam = Pinjam::find($id);
        $namaPeminjam = $pinjam->user->nama;
        if ($pinjam) {
            $this->pinjam_id = $pinjam->id;
            $this->nama = $namaPeminjam;
        }
    }

    public function destroy()
    {
        $pinjam = Pinjam::find($this->pinjam_id);
        if ($pinjam) {
            $this->pinjam_id = $pinjam->id;
            $pinjam->delete();
            session()->flash('success', 'Berhasil hapus data peminjam');
            $this->reset();
        } else {
            session()->flash('error', 'Data tidak ada');
        }
    }
}
