<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';

    public function render()
    {
        $users = null;
        if ($this->search){
            $users = User::where('name','like' , '%'.$this->search.'%')->get();
        }
        return view('livewire.search-users',  [
            'users' => $users,
        ]);
    }
}
