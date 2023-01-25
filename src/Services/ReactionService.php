<?php

namespace Nos\EmojiReaction\Services;

use Nos\BaseService\BaseService;
use Nos\EmojiReaction\Interfaces\Repositories\ReactionRepositoryInterface;
use Nos\EmojiReaction\Models\Reaction;

/**
 * @method ReactionRepositoryInterface getRepository()
 * @method Reaction create(array $data)
 * @method Reaction updateOrCreate(array $attributes, array $data)
 * @method Reaction find(int $modelId)
 */
final class ReactionService extends BaseService
{
    protected string $repositoryClass = ReactionRepositoryInterface::class;
}
