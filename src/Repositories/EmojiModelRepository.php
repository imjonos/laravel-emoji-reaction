<?php

namespace Nos\EmojiReaction\Repositories;

use Nos\BaseRepository\EloquentRepository;
use Nos\EmojiReaction\Interfaces\Repositories\EmojiModelRepositoryInterface;
use Nos\EmojiReaction\Models\EmojiModel;

/**
 * @method ?Emoji find(int $id)
 * @method ?Emoji create(array $data)
 */
final class EmojiModelRepository extends EloquentRepository implements EmojiModelRepositoryInterface
{
    protected string $class = EmojiModel::class;

    public function upsert(array $values, array $uniqueBy, ?array $update = null): int
    {
        return $this->getModel()->upsert($values, $uniqueBy, $update);
    }
}
