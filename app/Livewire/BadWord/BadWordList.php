<?php

namespace App\Livewire\BadWord;

use App\Models\BadWord\BadWord;
use Livewire\Component;

class BadWordList extends Component
{
    public $badWords;
    public $listeners = ["refreshBadWords" => "refresh"];

    public function openBadWordEditModal($badWordId)
    {
        $this->dispatch('openBadWordEditModal', $badWordId);
    }
    public function openBadWordAddModal()
    {
        $this->dispatch('openBadWordAddModal');
    }

    public function openBadWordDeleteModal($badWordId)
    {
        $this->dispatch('openBadWordDeleteModal', $badWordId);
    }
    public function mount(){
        $this->badWords =  BadWord::all()->sortBy('word');
    }

    public function refresh()
    {
        $this->badWords = BadWord::all()->sortBy('word');
    }
    public function render()
    {
        return view('livewire.bad-word.list');
    }
}
