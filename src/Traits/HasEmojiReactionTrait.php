<?php

namespace Nos\EmojiReaction\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Nos\EmojiReaction\Models\Reaction;
use Nos\EmojiReaction\Models\ReactionStatistic;

trait HasEmojiReactionTrait
{
    public function reactionStatistics(): MorphMany
    {
        return $this->morphMany(ReactionStatistic::class, 'model');
    }

    public function reactions(): MorphMany
    {
        return $this->morphMany(Reaction::class, 'model');
    }

    public function getModelId(): int
    {
        return $this->id;
    }

    public function getModelName(): string
    {
        return self::class;
    }
}
