<?php

Route::group(['middleware' => ['web']], function () {
    Route::namespace('\Nos\EmojiReaction\Http\Controllers')->group(function () {
        Route::get('/emoji-reactions', [EmojiReactionController::class, 'index'])->name(
            'emoji-reactions.index'
        );
        Route::post('/emoji-reactions', [EmojiReactionController::class, 'store'])->name(
            'emoji-reactions.store'
        );
    });
});
