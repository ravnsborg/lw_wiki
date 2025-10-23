<?php

namespace App\Livewire;

use App\Models\Entity;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EntityForm extends Component
{
    #[Validate('required')]
    public string $entityTitle = '';

    public function save()
    {
        $this->validate();

        Entity::create([
            'title' => $this->entityTitle,
            'user_id' => Auth::user()->id,
        ]);

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.entity-form');
    }
}
