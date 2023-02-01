<?php

namespace Nos\EmojiReaction\Repositories;

use Nos\BaseRepository\EloquentRepository;
use Nos\EmojiReaction\Interfaces\Repositories\ReactionRepositoryInterface;
use Nos\EmojiReaction\Models\Reaction;

/**
 * @method ?Reaction find(int $id)
 * @method ?Reaction create(array $data)
 */
final class ReactionRepository extends EloquentRepository implements ReactionRepositoryInterface
{
    protected string $class = Reaction::class;

    public function firstOrCreate(array $uniques, array $data = []): Reaction
    {
        return $this->getModel()->firstOrCreate($uniques, $data);
    }

    public function updateOrCreate(array $uniques, array $data = []): Reaction
    {
        return $this->getModel()->updateOrCreate($uniques, $data);
    }
}
