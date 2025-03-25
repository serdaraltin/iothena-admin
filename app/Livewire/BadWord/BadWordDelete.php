<?php

namespace App\Livewire\BadWord;

use App\Models\BadWord\BadWord;
use Livewire\Component;

class BadWordDelete extends Component
{
    public $badWordId;

    public $listeners = ['openBadWordDeleteModal' => 'openBadWordDeleteModal'];
    public $showModal = false;

    public function render()
    {
        return view('livewire.bad-word.delete');
    }

    public function deleteBadWord()
    {
        BadWord::destroy($this->badWordId);
        $this->showModal = false;
        $this->dispatch("refreshBadWords");
    }
    public function openBadWordDeleteModal($badWordId){
        $this->badWordId = $badWordId;
        $this->showModal = true;
    }

    public function closeBadWordDeleteModal(){
        $this->showModal = false;
    }

}
