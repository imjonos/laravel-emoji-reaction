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
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $emoji_id
 * @property int $count
 * @property string $model_type
 * @property string $code
 * @property int $model_id
 * @property string $created_at
 * @property string $updated_at
 */
final class ReactionStatistic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emoji_id',
        'count',
        'model_type',
        'model_id'
    ];

    protected $appends = ['code'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'model_type',
        'model_id'
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    public function emoji(): belongsTo
    {
        return $this->belongsTo(Emoji::class);
    }

    public function getCodeAttribute(): string
    {
        return $this->emoji->code;
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
