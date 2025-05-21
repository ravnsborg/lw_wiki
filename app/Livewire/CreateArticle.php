<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticle extends Component
{
    #[Validate('required')]
    public string $title = '';

    #[Validate('required')]
    public string $body = '';

    #[Validate('required')]
    public ?int $categoryId = 1;

    public bool $isFavorite = false;

    #[Validate('required')]
    public ?int $category_id;

    public $categoryList = [];

    public function mount(Article $article)
    {
        $this->categoryList = Category::where('entity_id', Auth::user()->preferred_entity_id)->get();
    }

    public function save()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'body' => $this->body,
            'category_id' => $this->categoryId,
            'is_favorite' => $this->isFavorite,
        ]);

        $this->redirect('/');

    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
