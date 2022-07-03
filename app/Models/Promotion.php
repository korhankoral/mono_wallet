<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

/**
 * Class Promotion
 * @package App\Models
 *
 * @property int $id
 * @property int $amount
 * @property int $quota
 * @property DateTime $start_date
 * @property DateTime $end_date
 *
 * @method Promotion find(int $id)
 * @method Promotion create(array $data)
 */
class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['start_date', 'end_date', 'amount', 'quota'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'start_date' => 'date:Y-m-d H:i',
        'end_date' => 'date:Y-m-d H:i',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = Str::random(12);
        });
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'promotion_users');
    }

    /**
     * @return int
     */
    public function usersCount(): int
    {
        return $this->users->count();
    }

    /**
     * @param int $user_id
     * @return bool
     */
    public function checkUser(int $user_id): bool
    {
        return $this->users()->where('user_id', $user_id)->count();
    }
}
