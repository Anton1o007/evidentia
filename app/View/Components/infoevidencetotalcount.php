<?php

namespace App\View\Components;

use Illuminate\View\Component;

class infoevidencetotalcount extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.infoevidencetotalcount');
    }
}
