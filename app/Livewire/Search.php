<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $searchText = '';

    public function render()
    {
        $this->reset('searchText');

        return view('livewire.search');
    }
}
