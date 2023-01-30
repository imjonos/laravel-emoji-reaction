<?php

namespace Nos\EmojiReaction\Services;

use Illuminate\Contracts\Container\BindingResolutionException;
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

    /**
     * @throws BindingResolutionException
     */
    public function checkModels(): void
    {
        $emojis = collect(config('emoji-reaction.models'))
            ->map(fn($model) => ['model' => $model])
            ->toArray();

        $this->getRepository()->upsert($emojis, ['model']);
    }
}
