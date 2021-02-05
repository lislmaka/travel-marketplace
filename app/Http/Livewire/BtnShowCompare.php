<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BtnShowCompare extends Component
{
    public $show = false;

    protected $listeners = ['showCompareBtn' => 'showCompareBtn'];

    public function showCompareBtn()
    {
        if (session('events.events_compare')) {
            $this->show = true;
        } else {
            $this->show = false;
        }
    }

    public function mount()
    {
        if (session('events.events_compare')) {
            $this->show = true;
        }
    }
    public function render()
    {
        return view('livewire.btn-show-compare');
    }
}
