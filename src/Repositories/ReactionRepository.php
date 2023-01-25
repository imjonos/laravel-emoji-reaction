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
}
