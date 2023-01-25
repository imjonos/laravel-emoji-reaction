<?php

namespace Nos\EmojiReaction;

use Illuminate\Support\ServiceProvider;
use Nos\EmojiReaction\Interfaces\Repositories\EmojiRepositoryInterface;
use Nos\EmojiReaction\Interfaces\Repositories\ReactionRepositoryInterface;
use Nos\EmojiReaction\Interfaces\Repositories\ReactionStatisticRepositoryInterface;
use Nos\EmojiReaction\Repositories\EmojiRepository;
use Nos\EmojiReaction\Repositories\ReactionRepository;
use Nos\EmojiReaction\Repositories\ReactionStatisticRepository;

final class EmojiReactionServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(resource_path('lang/vendor/nos/emoji-reaction'), 'nos.emoji-reaction');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/nos/emoji-reaction'),
        ], 'emoji-reaction.lang');

        $this->publishes([
            __DIR__ . '/../config/emoji-reaction.php' => config_path('emoji-reaction.php'),
        ], 'emoji-reaction.config');

        $this->publishes([
            __DIR__ . '/../database/migrations' => base_path('database/migrations'),
        ], 'emoji-reaction.migrations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/emoji-reaction.php', 'emoji-reaction');
        app()->bind(EmojiRepositoryInterface::class, EmojiRepository::class);
        app()->bind(ReactionRepositoryInterface::class, ReactionRepository::class);
        app()->bind(ReactionStatisticRepositoryInterface::class, ReactionStatisticRepository::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['emoji-reaction'];
    }
}
