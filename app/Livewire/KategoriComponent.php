<?php

namespace App\Livewire;

use App\Models\kategori;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class KategoriComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $nama, $deskripsi, $cate_id, $cari, $kategori_id;
    public function render()
    {

        if ($this->cari != '') {
            $data['kategori'] = kategori::where('nama', 'like', '%' . $this->cari . '%')->paginate(10);
        } else {
            $data['kategori'] = kategori::paginate(10);
        }
        return view('livewire.kategori-component', $data);
    }

    public function tambahKategori()
    {
        $this->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama tidak boleh berupa angka',

            'deskripsi.required' => 'Deskripsi tidak boleh kosong'
        ]);

        kategori::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,

        ]);

        session()->flash('success', 'Berhasil menambah kategori');
        $this->reset();
    }

    public function edit($id)
    {
        $kategori = kategori::find($id);

        if ($kategori) {
            $this->nama = $kategori->nama;
            $this->deskripsi = $kategori->deskripsi;
            $this->kategori_id = $kategori->id;
        }
    }
    public function update()
    {
        $kategori = kategori::find($this->kategori_id);

        if (!$kategori) {
            session()->flash('error', 'Kategori tidak ditemukan.');
            return;
        }

        $kategori->update([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi
        ]);

        session()->flash('success', 'Berhasil update kategori');
        $this->reset();
    }

    public function confirm($id)
    {
        $kategori = kategori::find($id);
        if ($kategori) {
            $this->nama = $kategori->nama;
            $this->kategori_id = $kategori->id;
        }
    }

    public function destroy()
    {
        $kategori = kategori::find($this->kategori_id);
        if ($kategori) {
            $kategori->delete();
            session()->flash('success', 'Berhasil Hapus!!');
            $this->reset();
        } else {
            session()->flash('error', 'Kategori tidak ditemukan.');
        }
    }
}
