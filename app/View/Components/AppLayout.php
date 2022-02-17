<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app', ['selected' => $this->name]);
    }
}
