<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\On;
use Livewire\Component;

#[On('favorite-list:refresh-favorites')]
class FavoriteList extends Component
{
    public $favoriteArticles;

    public function render()
    {
        $this->favoriteArticles = Article::where('is_favorite', 1)->get();

        return view('livewire.favorite-list', ['favoriteArticleList' => $this->favoriteArticles]);
    }
}
