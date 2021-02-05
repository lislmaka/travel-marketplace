<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BtnShowFavorites extends Component
{
    public $show = false;

    protected $listeners = ['showFavoritesBtn' => 'showFavoritesBtn'];

    public function showFavoritesBtn()
    {

    }

    public function render()
    {
        return view('livewire.btn-show-favorites');
    }
}
