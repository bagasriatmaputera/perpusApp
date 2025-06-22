<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    public function render()
    {
        // guanakan fitur pagination
        $data['user'] = User::paginate(10);
        return view('livewire.user-component',$data);
    }
}
