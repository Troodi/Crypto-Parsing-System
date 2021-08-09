<?php
namespace App\Repositories;
use App\Repositories\Interfaces\TagsRepositoryInterface;
use App\Models\Tag as Model;

class TagsRepository extends CoreRepository implements TagsRepositoryInterface
{
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /*
     * Метод возвращает все записи
     */
    public function all() :mixed {
        return $this->query()->all();
    }

    /*
     * Метод возвращает имя тега по его идентификатору
     */
    public function getNameById($id): string {
        $tag = $this->query()->all()->where('id', $id)->first()?->tag;
        return $tag ? $tag : '';
    }
}
