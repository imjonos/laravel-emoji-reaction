<?php

namespace Nos\EmojiReaction\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Nos\EmojiReaction\Models\ReactionStatistic;

trait HasEmojiReationTrait
{
    public function reactionStatistics(): MorphMany
    {
        return $this->morphMany(ReactionStatistic::class, 'model');
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
