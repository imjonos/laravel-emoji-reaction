<?php

namespace Nos\EmojiReaction\Repositories;

use Nos\BaseRepository\EloquentRepository;
use Nos\EmojiReaction\Interfaces\Repositories\ReactionStatisticRepositoryInterface;
use Nos\EmojiReaction\Models\ReactionStatistic;

/**
 * @method ?ReactionStatistic find(int $id)
 * @method ?ReactionStatistic create(array $data)
 */
final class ReactionStatisticRepository extends EloquentRepository implements ReactionStatisticRepositoryInterface
{
    protected string $class = ReactionStatistic::class;
}
