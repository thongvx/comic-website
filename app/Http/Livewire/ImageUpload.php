<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
class ImageUpload extends Component
{
    use WithFileUploads;
    public $image;

    public function upload(){
        $this->image->store('images', 'public');
    }
    public function render()
    {

        return view('livewire.image-upload');
    }
}
