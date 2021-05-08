<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Group extends Component
{
    public string $label;
    public string $for;
    public bool $error;
    public bool $helpText;
    public bool $inline;
    public bool $paddingless;
    public bool $borderless;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $for = '', $error = false, $helpText = false, $inline = false, $paddingless = false, $borderless = false)
    {
        $this->label = $label;
        $this->for = $for;
        $this->error = $error;
        $this->helpText = $helpText;
        $this->inline = $inline;
        $this->paddingless = $paddingless;
        $this->borderless = $borderless;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input.group');
    }
}
