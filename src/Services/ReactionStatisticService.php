<?php

namespace Nos\EmojiReaction\Services;

use Nos\BaseService\BaseService;
use Nos\EmojiReaction\Interfaces\Repositories\ReactionStatisticRepositoryInterface;
use Nos\EmojiReaction\Models\ReactionStatistic;

/**
 * @method ReactionStatisticRepositoryInterface getRepository()
 * @method ReactionStatistic create(array $data)
 * @method ReactionStatistic updateOrCreate(array $attributes, array $data)
 * @method ReactionStatistic find(int $modelId)
 */
final class ReactionStatisticService extends BaseService
{
    protected string $repositoryClass = ReactionStatisticRepositoryInterface::class;
}
