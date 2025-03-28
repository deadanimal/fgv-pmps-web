<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomDateInput extends Component
{
    public $id;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.custom-date-input');
    }
}
