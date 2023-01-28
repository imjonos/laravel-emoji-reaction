<?php

namespace Nos\EmojiReaction\Services;

use Illuminate\Database\Eloquent\Collection;
use Nos\BaseService\BaseService;
use Nos\EmojiReaction\Interfaces\Repositories\EmojiModelRepositoryInterface;
use Nos\EmojiReaction\Models\EmojiModel;

/**
 * @method EmojiModelRepositoryInterface getRepository()
 * @method EmojiModel create(array $data)
 * @method EmojiModel updateOrCreate(array $attributes, array $data)
 * @method EmojiModel find(int $modelId)
 */
final class EmojiModelService extends BaseService
{
    protected string $repositoryClass = EmojiModelRepositoryInterface::class;

    public function all(): Collection
    {
        $emojis = collect(config('emoji-reaction.models'))
            ->map(fn($code) => ['code' => $code])
            ->toArray();

        $this->getRepository()->upsert($emojis, ['code']);

        return parent::all();
    }
}
