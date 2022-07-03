<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wallet
 * @package App\Models
 *
 * @method Wallet create(array $data)
 */
class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'balance'];

    protected $hidden = ['user_id', 'created_at'];

    protected $casts = [
        'updated_at' => 'date:Y-m-d H:i'
    ];
}
