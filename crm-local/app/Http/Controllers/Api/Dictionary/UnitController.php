<?php

namespace App\Http\Controllers\Api\Dictionary;

use App\Models\Dictionary\Unit;

/**
 * CRUD-контроллер для справочника "Единицы измерения".
 */
class UnitController extends BaseCrudController
{
    /** @var class-string<Unit> */
    protected string $modelClass = Unit::class;

    protected array $searchable = ['name', 'short', 'okei_code'];
    protected array $sortable   = ['id','name','short','okei_code','created_at'];
    protected array $filterable = ['is_active'];

    protected function rules(string $scenario): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'short'     => ['nullable', 'string', 'max:16'],
            'okei_code' => ['nullable', 'string', 'max:16'],
            'is_active' => ['boolean'],
            'comment'   => ['nullable', 'string', 'max:2000'],
        ];
    }
}