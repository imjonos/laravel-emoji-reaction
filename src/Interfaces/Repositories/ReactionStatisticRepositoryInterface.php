<?php

namespace Nos\EmojiReaction\Interfaces\Repositories;

use Nos\BaseRepository\Interfaces\EloquentRepositoryInterface;
use Nos\EmojiReaction\Models\ReactionStatistic;

interface ReactionStatisticRepositoryInterface extends EloquentRepositoryInterface
{
    public function updateOrCreate(array $uniques, array $data = []): ReactionStatistic;

    public function firstOrCreate(array $uniques, array $data = []): ReactionStatistic;
}
