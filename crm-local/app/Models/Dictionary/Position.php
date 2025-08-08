<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Модель "Должность".
 */
class Position extends Model
{
    use SoftDeletes;

    protected $table = 'positions';

    protected $fillable = [
        'name',
        'code',
        'is_active',
        'comment',
    ];
}