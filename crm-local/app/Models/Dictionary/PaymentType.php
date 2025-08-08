<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Модель "Тип платежа".
 */
class PaymentType extends Model
{
    use SoftDeletes;

    protected $table = 'payment_types';

    protected $fillable = [
        'name',
        'short_name',
        'label_color',
        'is_visible',
        'comment',
    ];
}