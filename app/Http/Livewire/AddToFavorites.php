<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddToFavorites extends Component
{
    public $added = false;

    public function addRemoveFavorite()
    {
        if($this->added) {
            $this->added = false;
            // change session
        } else {
            $this->added = true;
            // change session
        }
    }

    public function render()
    {
        return view('livewire.add-to-favorites');
    }
}
