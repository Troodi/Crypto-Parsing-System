<?php
namespace App\Services;

use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use App\Repositories\TagsRepository;
use App\Services\Interfaces\ParsingServiceInterface;
use Illuminate\Support\Facades\Http;

class ParsingService implements ParsingServiceInterface
{
    private string $link = 'https://newsapi.org/v2/everything?q={query}&to={date}&sortBy=publishedAt&apiKey={apiKey}&pageSize=1';

    public function __construct()
    {
        $this->link = str_replace('{apiKey}', config('custom.news_api_key'), $this->link);
    }

    /*
     * Метод парсит новости и сохраняет их в базу данных
     */
    public function parseAndSaveNews(TagsRepository $tagsRepository, NewsRepository $newsRepository, SourceRepository $sourceRepository) : bool {
        foreach($tagsRepository->all() as $tag){
            $uri = str_replace('{query}', $tag->tag, $this->link);
            $date = $newsRepository->getDateForNewNews($tag->id);
            $uri = str_replace('{date}', $date, $uri);
            $result = Http::acceptJson()->get($uri)->json();
            if($result['status'] != 'ok'){
                continue;
            }
            $createdSource = $sourceRepository->createOrUpdate($result);
            $newsRepository->createNews($result, $createdSource->id, $tag->id);
        }
        return true;
    }
}
