<?php

namespace App\Livewire;

use App\Models\Entity;
use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $links = [];

    public $selectedEntity = [];

    public $entities = [];

    public $selectedEntityId = null;

    /*
     * Refresh entity and reload page to that entity's content
     */
    public function refreshEntity($id)
    {
        $user = User::where('preferred_entity_id', Auth::user()->preferred_entity_id)->first();
        if ($user) {
            $user->preferred_entity_id = $id;
            $user->save();
        }
        $this->redirect('/');

    }

    public function mount()
    {
        $this->entities = Entity::select('title', 'id')->orderBy('title')->get();

        $this->selectedEntity = $this->entities->find(Auth::user()->preferred_entity_id);
        $this->selectedEntityId = $this->selectedEntity->id;
        $this->links = Link::orderBy('title')->get();
    }

    public function render()
    {
        return view('livewire.header');
    }
}
