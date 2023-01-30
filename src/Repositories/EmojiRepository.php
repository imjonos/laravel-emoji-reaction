<?php

namespace Nos\EmojiReaction\Repositories;

use Nos\BaseRepository\EloquentRepository;
use Nos\EmojiReaction\Interfaces\Repositories\EmojiRepositoryInterface;
use Nos\EmojiReaction\Models\Emoji;

/**
 * @method ?Emoji find(int $id)
 * @method ?Emoji create(array $data)
 */
final class EmojiRepository extends EloquentRepository implements EmojiRepositoryInterface
{
    protected string $class = Emoji::class;

    public function upsert(array $values, array $uniqueBy, ?array $update = null): int
    {
        return $this->getModel()->upsert($values, $uniqueBy, $update);
    }

    public function firstOrCreate(array $data): Emoji
    {
        return $this->getModel()->firstOrCreate($data);
    }
}
