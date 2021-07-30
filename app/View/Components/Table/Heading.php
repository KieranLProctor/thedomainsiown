<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Heading extends Component
{
    public string $sortable;
    public string $direction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($direction = '', $sortable = '')
    {
        $this->direction = $direction !== null ? $direction : '';
        $this->sortable = $sortable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table.heading');
    }
}
