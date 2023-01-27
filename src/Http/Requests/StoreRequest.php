<?php

namespace Nos\EmojiReaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
{
    /**
     * authorize
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * rules
     */
    public function rules(): array
    {
        return [
            'user_name' => 'required|string',
            'publish' => 'required|boolean',
            'comment' => 'required|string',
            'post_id' => 'required|integer',
        ];
    }
}
