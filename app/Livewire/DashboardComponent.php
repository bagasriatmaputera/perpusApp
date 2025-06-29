<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\User;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $data['jumlahBuku'] = Buku::all()->count();
        $data['jumlahPinjam'] = Pinjam::all()->count();
        $data['jumlahMember'] = User::where('jenis','member')->count();
        $data['jumlahUser'] = User::all()->count();
        return view('livewire.dashboard-component',$data);
    }
}
