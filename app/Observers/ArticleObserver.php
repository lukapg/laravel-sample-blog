<?php

namespace App\Observers;

use App\Mail\ArticleCreated;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;

class ArticleObserver
{
    public function created(Article $article)
    {
        Mail::to('info@example.com')->send(new ArticleCreated($article));
    }
}