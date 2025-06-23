<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $nama, $email, $password;
    public function render()
    {
        // guanakan fitur pagination
        $data['user'] = User::paginate(10);
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
            'password' => $this->password,
        ]);
        // membuat session
        session()->flash('success','Berhasil menambah user');
        $this->reset();
    }
}
