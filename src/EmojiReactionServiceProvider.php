<?php

namespace Nos\EmojiReaction;

use Illuminate\Support\ServiceProvider;

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
