<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Модель "Тип сотрудника".
 */
class EmployeeType extends Model
{
    use SoftDeletes;

    protected $table = 'employee_types';

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'comment',
    ];
}