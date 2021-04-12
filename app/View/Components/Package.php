<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Package extends Component
{
    public $package;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($package)
    {
        $this->package = $package;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.package');
    }
}
