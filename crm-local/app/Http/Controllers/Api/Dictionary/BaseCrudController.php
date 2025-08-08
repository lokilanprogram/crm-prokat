<?php

namespace App\Http\Controllers\Api\Dictionary;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;

/**
 * Базовый контроллер CRUD для справочников.
 *
 * Позволяет переиспользовать логику поиска, фильтрации, сортировки и пагинации
 * для всех сущностей-справочников.
 */
abstract class BaseCrudController extends Controller
{
    /**
     * Полное имя класса модели.
     *
     * @var class-string<Model>
     */
    protected string $modelClass;

    /**
     * Колонки, по которым выполняется поиск по параметру "q".
     *
     * @var string[]
     */
    protected array $searchable = ['name'];

    /**
     * Разрешённые для сортировки колонки.
     *
     * @var string[]
     */
    protected array $sortable = ['id', 'name', 'created_at'];

    /**
     * Колонки, по которым можно фильтровать через filter[…].
     *
     * @var string[]
     */
    protected array $filterable = [];

    /**
     * Вывести список элементов с поддержкой поиска, фильтрации, сортировки и пагинации.
     */
    public function index(Request $request)
    {
        /** @var Model $model */
        $model = new $this->modelClass();
        $query = $model->newQuery();

        // Поиск
        if ($term = trim((string)$request->input('q'))) {
            $query->where(function ($w) use ($term) {
                foreach ($this->searchable as $idx => $col) {
                    if ($idx === 0) {
                        $w->where($col, 'like', "%{$term}%");
                    } else {
                        $w->orWhere($col, 'like', "%{$term}%");
                    }
                }
            });
        }

        // Фильтрация
        foreach ($this->filterable as $col) {
            $value = $request->input("filter.$col");
            if ($value !== null && $value !== '') {
                $query->where($col, $value);
            }
        }

        // Сортировка
        $sort = (string)$request->input('sort', 'id');
        $direction = str_starts_with($sort, '-') ? 'desc' : 'asc';
        $column = ltrim($sort, '-');
        if (!in_array($column, $this->sortable, true)) {
            $column = 'id';
        }
        $query->orderBy($column, $direction);

        // Пагинация
        $perPage = (int)$request->input('per_page', 25);
        $perPage = max(1, min($perPage, 100));

        return response()->json(
            $query->paginate($perPage)->appends($request->query())
        );
    }

    /**
     * Показать одну запись.
     */
    public function show($id)
    {
        return ($this->modelClass)::findOrFail($id);
    }

    /**
     * Создать запись.
     */
    public function store(Request $request)
    {
        $data = $this->validated($request, 'store');
        $model = ($this->modelClass)::create($data);
        return response()->json($model, 201);
    }

    /**
     * Обновить запись.
     */
    public function update(Request $request, $id)
    {
        $model = ($this->modelClass)::findOrFail($id);
        $data = $this->validated($request, 'update');
        $model->update($data);
        return response()->json($model);
    }

    /**
     * Пометить запись как удалённую (soft delete).
     */
    public function destroy($id)
    {
        $model = ($this->modelClass)::findOrFail($id);
        $model->delete();
        return response()->json(['status' => 'archived']);
    }

    /**
     * Восстановить удалённую запись.
     */
    public function restore($id)
    {
        $model = ($this->modelClass)::withTrashed()->findOrFail($id);
        $model->restore();
        return response()->json(['status' => 'restored']);
    }

    /**
     * Валидация входящих данных.
     *
     * @param Request $request
     * @param string $scenario
     * @return array
     */
    protected function validated(Request $request, string $scenario): array
    {
        return $request->validate($this->rules($scenario));
    }

    /**
     * Получить массив правил валидации для сохранения/обновления.
     *
     * @param string $scenario
     * @return array
     */
    abstract protected function rules(string $scenario): array;
}