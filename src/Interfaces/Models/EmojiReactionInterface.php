<?php

namespace Nos\EmojiReaction\Interfaces\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface EmojiReactionInterface
{
    public function reactionStatistics(): MorphMany;

    public function getModelId(): int;

    public function getModelName(): string;
}
