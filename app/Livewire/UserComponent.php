<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $nama, $email, $password, $user_id, $cari;

    public function render()
    {
        if ($this->cari != '') {
            $data['user'] = User::where('nama', 'like', '%' . $this->cari . '%')->orWhere('email', 'like', '%' . $this->cari . '%')->paginate(10);
        } else {
            $data['user'] = User::orderBy('nama')->paginate(10);
        }
        return view('livewire.user-component', $data);
    }

    public function tambahUser()
    {
        $this->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama tidak boleh berupa angka',

            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email salah',
            'email.unique' => 'Email sudah digunakan',

            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus lebih dari 8 karakter',
        ]);

        User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'jenis' => 'admin',
            'password' => bcrypt($this->password),
        ]);

        session()->flash('success', 'Berhasil menambah user');
        $this->reset();
    }

    public function edit($id)
    {
        $user = User::find($id);

        if ($user) {
            $this->user_id = $user->id;
            $this->nama = $user->nama;
            $this->email = $user->email;
            $this->password = '';
        }
    }

    public function update()
    {
        $user = User::find($this->user_id);

        if (!$user) {
            session()->flash('error', 'User tidak ditemukan.');
            return;
        }

        if ($this->password == '') {
            $user->update([
                'nama' => $this->nama,
                'email' => $this->email
            ]);
        } else {
            $user->update([
                'nama' => $this->nama,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ]);
        }

        session()->flash('success', 'Berhasil update user');
        $this->reset();
    }

    public function confirm($id)
    {
        $user = User::find($id);
        if ($user) {
            $this->nama = $user->nama;
            $this->user_id = $user->id;
        }
    }

    public function destroy()
    {
        $user = User::find($this->user_id);
        if ($user) {
            $user->delete();
            session()->flash('success', 'Berhasil Hapus!!');
            $this->reset();
        } else {
            session()->flash('error', 'User tidak ditemukan.');
        }
    }
}
