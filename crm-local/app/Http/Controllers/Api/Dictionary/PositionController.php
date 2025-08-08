<?php

namespace App\Http\Controllers\Api\Dictionary;

use App\Models\Dictionary\Position;

/**
 * CRUD-контроллер для справочника "Должности".
 */
class PositionController extends BaseCrudController
{
    /** @var class-string<Position> */
    protected string $modelClass = Position::class;

    protected array $searchable = ['name','code'];
    protected array $sortable   = ['id','name','code','created_at'];
    protected array $filterable = ['is_active'];

    protected function rules(string $scenario): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'code'      => ['nullable', 'string', 'max:64'],
            'is_active' => ['boolean'],
            'comment'   => ['nullable', 'string', 'max:2000'],
        ];
    }
}