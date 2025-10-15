<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Entity;


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
