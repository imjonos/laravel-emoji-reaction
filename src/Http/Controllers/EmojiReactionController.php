<?php

namespace Nos\EmojiReaction\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\{IndexRequest, StoreRequest};
use Illuminate\Http\JsonResponse;

/**
 * Class EmojiReactionController
 *
 * @package Nos\EmojiReaction\Http\Controllers
 */
final class EmojiReactionController extends Controller
{

    public function __construct()
    {
    }

    /**
     * List of records
     *
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        return response()->json();
    }

    /**
     * Store row
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return response()->json();
    }

}
