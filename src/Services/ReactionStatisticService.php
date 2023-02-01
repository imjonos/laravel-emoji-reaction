<?php

namespace Nos\EmojiReaction\Services;

use Illuminate\Support\Collection;
use Nos\BaseService\BaseService;
use Nos\EmojiReaction\Interfaces\Models\EmojiReactionInterface;
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

    public function getByModel(EmojiReactionInterface $emojiReactionModel): Collection
    {
        $result = collect([]);
        $stats = $emojiReactionModel->reactionStatistics()->where('count', '>', 0)->get();

        if ($stats) {
            $result = $stats->map(
                fn($item) => [
                    'code' => $item->code,
                    'count' => $item->count
                ]
            );
        }

        return $result;
    }
}
