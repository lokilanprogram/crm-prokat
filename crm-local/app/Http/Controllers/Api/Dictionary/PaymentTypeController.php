<?php

namespace App\Http\Controllers\Api\Dictionary;

use App\Models\Dictionary\PaymentType;

/**
 * CRUD-контроллер для справочника "Типы платежей".
 */
class PaymentTypeController extends BaseCrudController
{
    /** @var class-string<PaymentType> */
    protected string $modelClass = PaymentType::class;

    protected array $searchable = ['name', 'short_name'];
    protected array $sortable   = ['id','name','short_name','created_at'];
    protected array $filterable = ['is_visible'];

    protected function rules(string $scenario): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'short_name'  => ['nullable', 'string', 'max:64'],
            'label_color' => ['nullable', 'string', 'max:32'],
            'is_visible'  => ['boolean'],
            'comment'     => ['nullable', 'string', 'max:2000'],
        ];
    }
}