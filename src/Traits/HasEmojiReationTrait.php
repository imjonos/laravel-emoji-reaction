<?php

namespace Nos\EmojiReaction\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Nos\EmojiReaction\Models\EmojiModel;
use Nos\EmojiReaction\Models\ReactionStatistic;

trait HasEmojiReationTrait
{
    public function reactionStatistics(): MorphMany
    {
        return $this->morphMany(ReactionStatistic::class, 'model');
    }

    public function emojiModel(): ?EmojiModel
    {
        return EmojiModel::where('model', self::class)->first();
    }
}
