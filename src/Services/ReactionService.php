<?php

namespace Nos\EmojiReaction\Services;

use Exception;
use Nos\BaseService\BaseService;
use Nos\EmojiReaction\Interfaces\Models\EmojiReactionInterface;
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

    /**
     * @throws Exception
     */
    public function addReaction(EmojiReactionInterface $emojiReactionModel, int $emojiId): void
    {
        $fingerPrint = $this->getFingerPrint();

        $this->getRepository()->firstOrCreate([
            'emoji_id' => $emojiId,
            'fingerprint' => $fingerPrint,
            'model_type' => $emojiReactionModel->getModelName(),
            'model_id' => $emojiReactionModel->getModelId()
        ], [
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);
    }

    public function getFingerPrint(): string
    {
        return md5(request()->ip() . request()->userAgent());
    }
}
