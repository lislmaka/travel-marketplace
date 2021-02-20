<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BtnAddToCompare extends Component
{
    public $added = false;
    public $livewareParams = [];

//    public $event_id;
//    public $btnType;
//    public $hintPosition;
//    public $hintBtnPosition;

    protected $listeners = ['checkStateBtnAddToCompare' => 'checkStateBtnAddToCompare'];

    public function addRemoveCompare()
    {

        $sessionArray = session('events.events_compare');

        if ($this->added) {
            $this->added = false;

            // change session
            if ($sessionArray) {
                if (in_array($this->livewareParams['event_id'], $sessionArray)) {
                    array_splice($sessionArray, array_search($this->livewareParams['event_id'], $sessionArray), 1);
                    session(['events.events_compare' => $sessionArray]);
                }
            }

        } else {
            $this->added = true;

            if ($sessionArray) {
                if (!in_array($this->livewareParams['event_id'], $sessionArray)) {
                    session()->push('events.events_compare', $this->livewareParams['event_id']);
                }
            } else {
                session()->push('events.events_compare', $this->livewareParams['event_id']);
            }
        }

        // Вызов события для перерисовки кнопки в меню
        $this->emit('showCompareBtn');

    }

    public function checkStateBtnAddToCompare($eventId = null)
    {
        if ($eventId) {
            $this->livewareParams['event_id'] = $eventId;
        }

        $this->added = false;

        if (session('events.events_compare')) {
            if (in_array($this->livewareParams['event_id'], session('events.events_compare'))) {
                $this->added = true;
            }
        }
    }

    //public function mount($event_id, $btnType, $hintPosition, $hintBtnPosition)
    public function mount($livewareParams)
    {
        $this->livewareParams = $livewareParams;

        $this->checkStateBtnAddToCompare();
//        $this->btnType = $btnType;
//        $this->hintPosition = $hintPosition;
//        $this->hintBtnPosition = $hintBtnPosition;
    }

    public function render()
    {
        return view('livewire.btn-add-to-compare');
    }
}
