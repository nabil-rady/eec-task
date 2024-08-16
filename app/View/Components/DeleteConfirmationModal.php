<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteConfirmationModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public string $resourceName;
    public $resource;
    public function __construct(string $resourceName, $resource)
    {
        $this->resourceName = $resourceName;
        $this->resource = $resource;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-confirmation-modal');
    }
}
