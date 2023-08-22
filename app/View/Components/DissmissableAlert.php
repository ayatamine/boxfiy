<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DissmissableAlert extends Component
{
    public $type;
    /**
     * Create a new component instance.
     */
    public function __construct($type="success")
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $type = $this->type;
        return view('components.dissmissable-alert',compact('type'));
    }
}
