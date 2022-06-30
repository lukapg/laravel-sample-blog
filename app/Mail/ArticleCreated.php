<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ArticleCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $article;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com', 'Article created')
            ->view('emails.article.created');
    }
}