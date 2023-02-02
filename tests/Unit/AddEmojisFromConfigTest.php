<?php

namespace Tests\Unit;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Nos\EmojiReaction\Models\Emoji;
use Nos\EmojiReaction\Services\EmojiService;
use Tests\TestCase;

final class AddEmojisFromConfigTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     * @throws ValidationException
     * @throws BindingResolutionException
     */
    public function test_rule(): void
    {
        $service = app()->make(EmojiService::class);
        $service->addEmojisFromConfig();
        $this->assertDatabaseCount(Emoji::class, count(config('emoji-reaction.emojis')));
    }
}
