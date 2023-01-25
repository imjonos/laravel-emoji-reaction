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

/**
 * @property int $id
 * @property int $emoji_id
 * @property string $ip_address
 * @property string $user_agent
 * @property string $fingerprint
 * @property string $model_type
 * @property int $model_id
 * @property string $created_at
 * @property string $updated_at
 */
final class Reaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emoji_id',
        'ip_address',
        'user_agent',
        'fingerprint',
        'model_type',
        'model_id'
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
