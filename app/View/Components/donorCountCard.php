<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class donorCountCard extends Component
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
        $donationCount = \App\Models\bloodRequests::where('donor_id','!=','')->count();

        return view('components.donor-count-card', [
            'donationCount' => $donationCount,
        ]);

       
    }
}
