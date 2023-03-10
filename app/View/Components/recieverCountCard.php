<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class recieverCountCard extends Component
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
      
        $acceptedCount = \App\Models\bloodRequests::where('recipient_id','!=','')->count();


        return view('components.reciever-count-card', [
            'acceptedCount' => $acceptedCount,
        ]);
       
    }
}
