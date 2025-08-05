<?php

namespace App\Livewire;

use App\Models\Entity;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $links = [];

    public string $entityTitle;

    public function mount()
    {
        $this->entityTitle = Entity::find(Auth::user()->preferred_entity_id)->title;
        $this->links = Link::all();
    }

    public function render()
    {
        return view('livewire.header');
    }
}
