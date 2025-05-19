<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class confirmDeletePopup extends Component
{
    public $itemId;
    public $itemName;
    public $wireAction;
    /**
     * Create a new component instance.
     */
    public function __construct($itemId, $itemName = 'this item', $wireAction = 'delete')
    {
        $this->itemId = $itemId;
        $this->itemName = $itemName;
        $this->wireAction = $wireAction;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.confirm-delete-popup');
    }
}
