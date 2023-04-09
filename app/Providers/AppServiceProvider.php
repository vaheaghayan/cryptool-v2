<?php

namespace App\Providers;

use App\Models\Comments\CommentContract;
use App\Models\Comments\CommentManager;
use App\Models\Conversation\ConversationContract;
use App\Models\Conversation\ConversationManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConversationContract::class, ConversationManager::class);
        $this->app->bind(CommentContract::class, CommentManager::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
