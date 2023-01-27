<?php
/**
 * Eugeny Nosenko 2023
 * https://toprogram.ru
 * info@toprogram.ru
 */

namespace Nos\EmojiReaction\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property int $id
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 */
final class Emoji extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    public function reactionStatistic(): morphOne
    {
        return $this->morphOne(ReactionStatistic::class, 'model');
    }

    public function reactions(): morphMany
    {
        return $this->morphMany(Reaction::class, 'model');
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

}
