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

    public $tgl_pinjam, $member = '', $tgl_kembali, $status, $buku = '', $cari, $pinjam_id, $nama, $kembalikan, $buku_id;

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
        $buku = Buku::find($this->buku);
        $this->validate([
            'member' => 'required|exists:users,id',
            'buku' => 'required|exists:bukus,id'
        ], [
            'member.required' => 'Member wajib dipilih.',
            'member.exists' => 'Member tidak ditemukan.',

            'buku.required' => 'Buku wajib dipilih.',
            'buku.exists' => 'Buku tidak ditemukan.',
        ]);
        $qty = 1;
        $now = date('Y-m-d');
        $tgl_kembali = date('Y-m-d', strtotime($now . '+7 day'));

        // logika jumlah
        if ($buku->jumlah > 0) {
            if ($buku) {
                Pinjam::create([
                    'user_id' => $this->member,
                    'tgl_pinjam' => $now,
                    'tgl_kembali' => $tgl_kembali,
                    'status' => 'pinjam',
                    'buku_id' => $this->buku
                ]);
                $buku->update([
                    'jumlah' => $buku->jumlah - $qty
                ]);
                session()->flash('success', 'Berhasil tambah peminjam');
                $this->reset();
            }
        } else {
            session()->flash('error', 'Buku tidak tersedia');
        }





    }

    public function edit($id)
    {
        $pinjam = Pinjam::find($id);
        $namaPeminjam = $pinjam->user->nama;
        $namaBuku = $pinjam->buku->judul;
        if ($pinjam) {
            $this->nama = $namaPeminjam;
            $this->buku = $namaBuku;
            $this->tgl_kembali = $pinjam->tgl_kembali;
            $this->tgl_pinjam = $pinjam->tgl_pinjam;
            $this->pinjam_id = $pinjam->id;
            $this->status = 'kembali';
            $this->buku_id = $pinjam->buku->id;
            $this->kembalikan = $pinjam->tgl_dikembalikan;
        }
        // dd($this->kembalikan);
    }

    public function update()
    {
        $pinjam = Pinjam::find($this->pinjam_id);
        $buku = Buku::find($this->buku_id);
        $now = date('Y-m-d');
        $qty = 1;
        if ($pinjam->status == 'pinjam') {
            $pinjam->update([
                'status' => 'kembali',
                'tgl_dikembalikan' => $now
            ]);

            $buku->update([
                'jumlah' => $buku->jumlah + $qty
            ]);
            session()->flash('success', 'Berhasil dikembalikan!');
            $this->reset();
        } else {
            session()->flash('error', 'Buku sudah dikembalikan');
        }
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
