<?php

namespace Nos\EmojiReaction\Services;

use Exception;
use Nos\BaseService\BaseService;
use Nos\EmojiReaction\Interfaces\Models\EmojiReactionInterface;
use Nos\EmojiReaction\Interfaces\Repositories\ReactionRepositoryInterface;
use Nos\EmojiReaction\Interfaces\Repositories\ReactionStatisticRepositoryInterface;
use Nos\EmojiReaction\Models\Emoji;
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
    private ReactionStatisticRepositoryInterface $reactionStatisticRepository;

    public function __construct(ReactionStatisticRepositoryInterface $reactionStatisticRepository)
    {
        $this->reactionStatisticRepository = $reactionStatisticRepository;
    }

    /**
     * @throws Exception
     */
    public function addReaction(EmojiReactionInterface $emojiReactionModel, Emoji $emoji): void
    {
        $fingerPrint = $this->getFingerPrint();

        $oldEmojiReaction = $emojiReactionModel->reactions()
            ->where('fingerprint', $fingerPrint)
            ->first();

        if ($oldEmojiReaction && $oldEmojiReaction->id === $emoji->id) {
            return;
        }

        $reaction = $this->getRepository()->updateOrCreate([
            'fingerprint' => $fingerPrint,
            'model_type' => $emojiReactionModel->getModelName(),
            'model_id' => $emojiReactionModel->getModelId()
        ], [
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'emoji_id' => $emoji->id
        ]);

        $statistic = $this->reactionStatisticRepository->firstOrCreate([
            'emoji_id' => $emoji->id,
            'model_type' => $emojiReactionModel->getModelName(),
            'model_id' => $emojiReactionModel->getModelId()
        ]);

        $this->reactionStatisticRepository->incrementCount($statistic);

        if (!$reaction->wasRecentlyCreated && $oldEmojiReaction) {
            $statistic = $this->reactionStatisticRepository->firstOrCreate([
                'emoji_id' => $oldEmojiReaction->emoji_id,
                'model_type' => $emojiReactionModel->getModelName(),
                'model_id' => $emojiReactionModel->getModelId()
            ]);

            $this->reactionStatisticRepository->decrementCount($statistic);
        }
    }

    public function getFingerPrint(): string
    {
        //TODO: need to add service
        return md5(request()->ip() . request()->userAgent());
    }
}
