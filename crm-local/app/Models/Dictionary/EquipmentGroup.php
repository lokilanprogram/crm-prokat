<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Модель "Группа оборудования".
 */
class EquipmentGroup extends Model
{
    use SoftDeletes;

    protected $table = 'equipment_groups';

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'comment',
    ];
}