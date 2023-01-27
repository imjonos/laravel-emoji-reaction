<?php

namespace Nos\EmojiReaction\Services;

use Illuminate\Database\Eloquent\Collection;
use Nos\BaseService\BaseService;
use Nos\EmojiReaction\Interfaces\Repositories\EmojiRepositoryInterface;
use Nos\EmojiReaction\Models\Emoji;

/**
 * @method EmojiRepositoryInterface getRepository()
 * @method Emoji create(array $data)
 * @method Emoji updateOrCreate(array $attributes, array $data)
 * @method Emoji find(int $modelId)
 */
final class EmojiService extends BaseService
{
    protected string $repositoryClass = EmojiRepositoryInterface::class;

    public function all(): Collection
    {
        $emojis = collect(config('emoji-reaction.emojis'))
            ->map(fn($code) => ['code' => $code])
            ->toArray();

        $this->getRepository()->upsert($emojis, ['code']);

        return parent::all();
    }
}
