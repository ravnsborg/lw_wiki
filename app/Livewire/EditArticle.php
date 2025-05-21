<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditArticle extends Component
{
    public ?Article $article;

    #[Validate('required')]
    public string $title;

    #[Validate('required')]
    public string $body;

    #[Validate('required')]
    public ?int $category_id;

    public $categoryList = [];

    public bool $isFavorite = false;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->body = $article->body;

        $this->category_id = $article->category->id;

        $this->categoryList = Category::where('entity_id', Auth::user()->preferred_entity_id)->get();
    }

    public function update()
    {
        $this->validate();

        $this->article->update(
            $this->only('title', 'body', 'category_id')
        );

        $this->redirect('/');

    }

    public function render()
    {
        return view('livewire.edit-article');
    }
}
