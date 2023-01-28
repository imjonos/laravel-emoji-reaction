<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateEmojiModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('emoji_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emoji_id')->index();
            $table->string('model')->index();
            $table->timestamps();

            $table->foreign('emoji_id')
                ->references('id')
                ->on('emojis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('emoji_models');
    }
}
