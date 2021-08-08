<?php
namespace App\Repositories;

use App\Models\News as Model;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use Carbon\Carbon;

class NewsRepository extends CoreRepository implements NewsRepositoryInterface
{
    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function all() :mixed {
        return $this->query()->all();
    }

    public function countByTag($tag_id): int {
        return $this->query()->where('tag_id', $tag_id)->count();
    }

    public function getLatestNewsTime($tag_id): mixed
    {
        return $this->query()->where('tag_id', $tag_id)->latest()->first()?->publishedAt;
    }

    public function createNews($array, $source_id, $tag_id): mixed
    {
        $array = $array["articles"][0];
        unset($array['source']);
        $source_array = ['source_id' => $source_id, 'tag_id' => $tag_id];
        $array = array_merge($array, $source_array);
        return $this->query()->create($array);
    }

    public function getDateForNewNews($tag_id): mixed {
        if(!$this->countByTag($tag_id)){
            return Carbon::now()->subMonth()->format('Y-m-d\TH:i:s');
        } else {
            return Carbon::parse($this->getLatestNewsTime($tag_id))->subSecond()->format('Y-m-d\TH:i:s');
        }
    }

    public function groupByTag($groupBy, TagsRepository $tagsRepository, SourceRepository $sourceRepository): mixed {
        $array = ['source' => 'source_id', 'tag' => 'tag_id', 'date' => 'publishedAt'];
        $news = $this->all()->groupBy($array[$groupBy]);
        $data = [];
        switch($groupBy){
            case 'source':
                foreach($news as $key => $value){
                    $data[$sourceRepository->getNameById($key)] = $news[$key];
                }
                break;
            case 'tag':
                foreach($news as $key => $value){
                    $data[$tagsRepository->getNameById($key)] = $news[$key];
                }
                break;
            case 'date':
                $data = $news;
                break;
        }
        return $data;
    }
}
