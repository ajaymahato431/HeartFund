<?php

namespace App\View\Components\frontend;

use App\Models\Gallery;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class footer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $galleries = Gallery::latest()->take(4)->get();
        return view('components.frontend.footer', compact('galleries'));
    }
}
