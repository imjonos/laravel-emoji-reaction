<?php

namespace Nos\EmojiReaction\Interfaces\Repositories;

use Nos\BaseRepository\Interfaces\EloquentRepositoryInterface;
use Nos\EmojiReaction\Models\Emoji;

interface EmojiRepositoryInterface extends EloquentRepositoryInterface
{
    public function upsert(array $values, array $uniqueBy, ?array $update = null): int;

    public function firstOrCreate(array $data): Emoji;

}
