<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\On;
use Livewire\Component;

#[On('favorite-list:refresh-favorites')]
class FavoriteList extends Component
{
    public function render()
    {
        $favoriteArticles = Article::where('is_favorite', 1)->orderBy('title')->get();

        return view('livewire.favorite-list', ['favoriteArticleList' => $favoriteArticles]);
    }
}
