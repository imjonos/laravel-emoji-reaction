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
}
