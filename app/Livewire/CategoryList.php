<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CategoryList extends Component
{
    public function render()
    {
        return view('livewire.category-list', ['categoryList' => Category::where('entity_id', Auth::user()->preferred_entity_id)->get()]);
    }
}
