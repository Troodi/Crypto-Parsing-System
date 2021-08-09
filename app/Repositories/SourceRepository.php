<?php
namespace App\Repositories;

use App\Models\Source as Model;
use App\Repositories\Interfaces\SourcesRepositoryInterface;

class SourceRepository extends CoreRepository implements SourcesRepositoryInterface
{
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /*
     * Метод создает или обновляет запись
     */
    public function createOrUpdate($array): mixed
    {
        $sources = $array['articles'][0]['source'];
        $sourcesArray = [
            'source_id' => $sources['id'],
            'name' => $sources['name']
        ];
        return $this->query()->updateOrCreate($sourcesArray);
    }

    /*
     * Метод возвращает имя источника по его идентификатору
     */
    public function getNameById($id): string {
        $source = $this->query()->all()->where('id', $id)->first()?->name;
        return $source ? $source : '';
    }
}
