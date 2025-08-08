<?php

namespace App\Http\Controllers\Api\Dictionary;

use App\Models\Dictionary\EmployeeType;

/**
 * CRUD-контроллер для справочника "Типы сотрудников".
 */
class EmployeeTypeController extends BaseCrudController
{
    /** @var class-string<EmployeeType> */
    protected string $modelClass = EmployeeType::class;

    protected array $searchable = ['name'];
    protected array $sortable   = ['id','name','created_at'];
    protected array $filterable = ['is_active'];

    protected function rules(string $scenario): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'is_active'   => ['boolean'],
            'comment'     => ['nullable', 'string', 'max:2000'],
        ];
    }
}