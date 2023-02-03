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

    public function updateOrCreate(array $uniques, array $data = []): ReactionStatistic
    {
        return $this->getModel()->updateOrCreate($uniques, $data);
    }

    public function firstOrCreate(array $uniques, array $data = []): ReactionStatistic
    {
        return $this->getModel()->firstOrCreate($uniques, $data);
    }

    public function incrementCount(ReactionStatistic $reactionStatistic): void
    {
        $this->update($statistic->id, [
            'count' => $statistic->count + 1
        ]);
    }

    public function decrementCount(ReactionStatistic $reactionStatistic): void
    {
        $count = $reactionStatistic->count;

        $this->update($reactionStatistic->id, [
            'count' => ($count > 0) ? $count - 1 : 0
        ]);
    }

}
