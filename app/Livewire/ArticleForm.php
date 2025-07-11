<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Services\PatternFormatter;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ArticleForm extends Component
{
    public Article $article;

    #[Validate('required')]
    public string $title = '';

    #[Validate('required')]
    public string $body = '';

    public bool $isFavorite = false;

    #[Validate('required')]
    public ?int $category_id = null;

    public $categoryList = [];

    public function mount($article = null)
    {
        if ($article) {
            $this->article = $article;
            $this->title = $article->title;
            $this->body = $article->body;
            $this->category_id = $article->category->id;
        } else {
            // Set default category id selected
            $this->category_id = Category::pluck('id')->first();
            $this->article = new Article;
        }

        $this->categoryList = Category::where('entity_id', Auth::user()->preferred_entity_id)->get();
    }

    public function save()
    {
        $this->validate();

        Article::updateOrCreate(
            ['id' => $this->article->id],
            [
                'title' => $this->title,
                'body' => PatternFormatter::convert($this->body),
                'category_id' => $this->category_id,
                'is_favorite' => $this->isFavorite,
            ]
        );

        session()->flash('message', $this->article->id ? 'Article updated!' : 'Article created!');

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.article-form');
    }
}
