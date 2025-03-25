<?php

namespace App\Livewire\BadWord;

use App\Models\BadWord\BadWord;
use Livewire\Component;

class BadWordEdit extends Component
{
    public $badWord;
    public $badWordId,$priority, $word, $match;

    public $showModal = false;

    protected $listeners = ['openBadWordEditModal' => 'openBadWordEditModal'];

    public function render()
    {
        return view('livewire.bad-word.edit');
    }
    public function mount()
    {
    }
    public function updateBadWord(){

        try {
            $this->validate([
                'priority' => 'required',
                'word' => 'required',
                'match' => 'required',
            ]);

            $badWord = BadWord::find($this->badWord->id);

            $badWord->update([
                'priority' => strtolower($this->priority),
                'word' => $this->word,
                'match' => $this->match,
            ]);
        }
        catch (\Exception $exception){
            session()->flash('error', $exception->getMessage());
            return;
        }

        session()->flash('message', 'Bad Word has been updated.');
        $this->dispatch("refreshBadWords");
    }
    public function openBadWordEditModal($badWordId){
        $this->badWord = BadWord::find($badWordId);

        $this->badWordId = $badWordId;
        $this->priority = $this->badWord->priority;
        $this->word = $this->badWord->word;
        $this->match = $this->badWord->match;

        $this->showModal = true;
    }
    public function closeBadWordEditModal(){
        $this->showModal = false;
    }


}
