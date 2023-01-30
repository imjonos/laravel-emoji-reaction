<?php

namespace Nos\EmojiReaction\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\{IndexRequest, StoreRequest};
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Nos\EmojiReaction\Models\EmojiModel;
use Nos\EmojiReaction\Services\EmojiModelService;
use Nos\EmojiReaction\Services\EmojiService;

/**
 * Class EmojiReactionController
 *
 * @package Nos\EmojiReaction\Http\Controllers
 */
final class EmojiReactionController extends Controller
{
    private EmojiModelService $emojiModelService;
    private EmojiService $emojiService;

    public function __construct(EmojiModelService $emojiModelService, EmojiService $emojiService)
    {
        $this->emojiModelService = $emojiModelService;
        $this->emojiService = $emojiService;
    }

    /**
     * List of records
     *
     * @param IndexRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $this->emojiService->checkEmojis();
        $this->emojiModelService->checkModels();

        return response()->json($this->emojiService->all());
    }

    /**
     * Store row
     * @param StoreRequest $request
     * @param EmojiModel $emojiModel
     * @return JsonResponse
     */
    public function store(StoreRequest $request, EmojiModel $emojiModel): JsonResponse
    {
        return response()->json();
    }

}
