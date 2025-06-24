<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class MemberComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $nama, $jenis, $alamat, $email, $telepon, $member_id, $cari, $password;
    public function render()
    {
        if ($this->cari != '') {
            $data['member'] = User::where('jenis', 'member')
                ->where(function ($query) {
                    $query->where('nama', 'like', '%' . $this->cari . '%')
                        ->orWhere('email', 'like', '%' . $this->cari . '%');
                })->paginate(10);
        } else {
            $data['member'] = User::where('jenis', 'member')->paginate(10);
        }
        return view('livewire.member-component', $data);
    }
    public function tambahMember()
    {
        $this->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required|string',
            'telepon' => 'required|numeric',
            'password' => 'required|min:8',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.regex' => 'Nama hanya boleh berupa huruf',

            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email salah',
            'email.unique' => 'Email sudah digunakan',

            'alamat.required' => 'Alamat tidak boleh kosong',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.numeric' => 'Telepon harus berupa angka',

            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus lebih dari 8 karakter',
        ]);

        User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'jenis' => 'member',
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'password' => bcrypt($this->password)
        ]);

        session()->flash('success', 'Berhasil menambah member');
        $this->reset(['nama', 'email', 'alamat', 'telepon', 'password']);
    }

    public function edit($id)
    {
        $member = User::find($id);

        if ($member) {
            $this->member_id = $member->id;
            $this->nama = $member->nama;
            $this->email = $member->email;
            $this->telepon = $member->telepon;
            $this->alamat = $member->alamat;
            $this->password = '';
        }
    }

    public function update()
    {
        $member = User::find($this->member_id);

        if (!$member) {
            session()->flash('error', 'Member tidak ditemukan.');
            return;
        }

        if ($this->password == '') {
            $member->update([
                'nama' => $this->nama,
                'email' => $this->email,
                'telepon' => $this->telepon,
                'alamat' => $this->alamat,
            ]);
        } else {
            $member->update([
                'nama' => $this->nama,
                'email' => $this->email,
                'telepon' => $this->telepon,
                'alamat' => $this->alamat,
                'password' => bcrypt($this->password)
            ]);
        }

        session()->flash('success', 'Berhasil update member');
        return redirect()->route('member');
    }

    public function confirm($id)
    {
        $member = User::find($id);
        if ($member) {
            $this->nama = $member->nama;
            $this->member_id = $member->id;
        }
    }

    public function destroy()
    {
        $member = User::find($this->member_id);
        if ($member) {
            $member->delete();
            session()->flash('success', 'Berhasil Hapus!!');
            $this->reset();
        } else {
            session()->flash('error', 'Member tidak ditemukan.');
        }
    }
}
