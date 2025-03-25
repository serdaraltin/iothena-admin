<?php

namespace App\Livewire\BadWord;

use App\Models\BadWord\BadWord;
use Livewire\Component;

class BadWordAdd extends Component
{
    public $badWord;
    public $badWordId, $priority = "low", $word, $match;

    public $showModal = false;

    protected $listeners = ['openBadWordAddModal' => 'openBadWordAddModal'];

    public function render()
    {
        return view('livewire.bad-word.add');
    }
    public function addBadWord()
    {
        try {
            $this->validate([
                'priority' => 'required',
                'word' => 'required',
                'match' => 'required',
            ]);

            BadWord::create([
                'priority' => strtolower($this->priority),
                'word' => $this->word,
                'match' => $this->match,
            ]);
        }
        catch (\Exception $exception){
            session()->flash('error', $exception->getMessage());
            return;
        }

        session()->flash('message', 'Bad Word has been added.');
        $this->resetModal();
    }
    public function resetModal()
    {
        $this->priority = 'low';
        $this->word = null;
        $this->match = null;
    }
    public function openBadWordAddModal(){
        $this->showModal = true;
    }
    public function closeBadWordAddModal(){
        $this->showModal = false;
    }

}
