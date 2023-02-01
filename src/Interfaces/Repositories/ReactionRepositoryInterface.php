<?php

namespace Nos\EmojiReaction\Interfaces\Repositories;

use Nos\BaseRepository\Interfaces\EloquentRepositoryInterface;
use Nos\EmojiReaction\Models\Reaction;

interface ReactionRepositoryInterface extends EloquentRepositoryInterface
{
    public function firstOrCreate(array $uniques, array $data = []): Reaction;

    public function updateOrCreate(array $uniques, array $data = []): Reaction;
}
