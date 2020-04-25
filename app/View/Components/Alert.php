<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    // /**
    //  * The alert type.
    //  *
    //  * @var string
    //  */
    // public $type;

    // /**
    //  * The alert message.
    //  *
    //  * @var string
    //  */
    // public $message;
    // /**
    //  * Create a new component instance.
    //  *
    //  * @return void
    //  */
    // public function __construct($type, $message)
    // {
    //     $this -> type = $type;
    //     $this -> message= $message;
    // }


    public function __construct()
    {
        # code...
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');

        //inline component
        // php artisan make:component Alert --inline
        //  return <<<'blade'
        // <div class="alert alert-danger">
        //     {{ $slot }}
        // </div>
        // blade;
    }
}
