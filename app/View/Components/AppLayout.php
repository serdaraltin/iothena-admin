<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $layout, $dir, $assets;

    public function __construct($layout = '', $dir=false, $assets = [])
    {
        $this->layout = $layout;
        $this->dir = $dir;
        $this->assets = $assets;
    }


    public function mount(){


    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {

        if (!Auth::check() || Auth::user()->user_type === null) {
            return redirect('/login');
        }
         return view('layouts.dashboard.dashboard');

    }
}
