<?php

namespace Nos\EmojiReaction\Interfaces\Repositories;

use Nos\BaseRepository\Interfaces\EloquentRepositoryInterface;

interface EmojiModelRepositoryInterface extends EloquentRepositoryInterface
{
    public function upsert(array $values, array $uniqueBy, ?array $update = null): int;
}
