<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;
use App\Models\kategori;
use Livewire\WithPagination;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class BukuComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $judul, $penulis, $penerbit, $tahun, $isbn, $jumlah, $kategori = '', $buku_id, $cari;
    public function render()
    {
        if ($this->cari != '') {
            $data['buku'] = Buku::with('kategori')->where('judul', 'like', '%' . $this->cari . '%')->paginate(10);
        } else {
            $data['buku'] = Buku::with('kategori')->simplePaginate(10);
        }

        //ambil data Kategori
        $data['category'] = kategori::all();
        return view('livewire.buku-component', $data);
    }

    public function tambahBuku()
    {
        $this->validate([
            'judul' => 'required|min:5',
            'kategori' => 'required|exists:kategoris,id',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun' => 'required|numeric|digits:4|min:1900|max:' . date('Y'),
            'isbn' => 'required|numeric|digits_between:10,13',
            'jumlah' => 'required|numeric|min:1',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.min' => 'Judul minimal 5 karakter.',

            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.exists' => 'Kategori tidak ditemukan.',

            'penulis.required' => 'Nama penulis wajib diisi.',
            'penulis.string' => 'Penulis harus berupa teks.',

            'penerbit.required' => 'Nama penerbit wajib diisi.',
            'penerbit.string' => 'Penerbit harus berupa teks.',

            'tahun.required' => 'Tahun terbit wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'tahun.digits' => 'Tahun harus 4 digit.',
            'tahun.min' => 'Tahun tidak valid.',
            'tahun.max' => 'Tahun tidak boleh melebihi tahun sekarang.',

            'isbn.required' => 'ISBN wajib diisi.',
            'isbn.numeric' => 'ISBN harus berupa angka.',
            'isbn.digits_between' => 'ISBN harus antara 10 sampai 13 digit.',

            'jumlah.required' => 'Jumlah buku wajib diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah minimal 1 buku.',
        ]);

        Buku::create([
            'judul' => $this->judul,
            'kategori_id' => $this->kategori,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'isbn' => $this->isbn,
            'tahun' => $this->tahun,
            'jumlah' => $this->jumlah,
        ]);

        session()->flash('success', 'Berhasil tambah buku');
        $this->reset();
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        if ($buku) {
            $this->judul = $buku->judul;
            $this->kategori = $buku->kategori_id;
            $this->penulis = $buku->penulis;
            $this->penerbit = $buku->penerbit;
            $this->isbn = $buku->isbn;
            $this->tahun = $buku->tahun;
            $this->jumlah = $buku->jumlah;
            $this->buku_id = $buku->id;
        }
    }

    public function update()
    {
        $buku = Buku::find($this->buku_id);

        if ($buku) {
            $this->validate([
                'judul' => 'required|string|max:255',
                'kategori' => 'required|exists:kategoris,id',
                'penulis' => 'required|string|max:255',
                'penerbit' => 'required|string|max:255',
                'isbn' => 'nullable|string|max:20',
                'tahun' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
                'jumlah' => 'required|integer|min:1',
            ]);

            $buku->update([
                'judul' => $this->judul,
                'kategori_id' => $this->kategori,
                'penulis' => $this->penulis,
                'penerbit' => $this->penerbit,
                'isbn' => $this->isbn,
                'tahun' => $this->tahun,
                'jumlah' => $this->jumlah,
            ]);

            session()->flash('success', 'Berhasil edit buku');
            $this->reset();
        } else {
            session()->flash('error', 'Data tidak ditemukan');
        }
    }

    public function confirm($id)
    {
        $buku = Buku::find($id);
        if ($buku) {
            $this->buku_id = $buku->id;
            $this->judul = $buku->judul;
        } else {
            session()->flash('error', 'Data tidak ditemukan');
        }
    }

    public function destroy()
    {
        $buku = Buku::find($this->buku_id);
        if ($buku) {
            $buku->delete();
            session()->flash('success', 'Berhasil hapus buku');
            $this->reset();
        } else {
            session()->flash('error', 'Data tidak ditemukan');
        }
    }
}
