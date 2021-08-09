<?php
namespace App\Services;

use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use App\Repositories\TagsRepository;

class NewsService
{
    /*
     * Метод отдает новости в api, если передана группировка то выдача будет сгруппированна
     */
    public function getNews($groupBy, NewsRepository $newsRepository, ApiService $apiService, TagsRepository $tagsRepository, SourceRepository $sourceRepository){
        if(!$groupBy){
            return $apiService->success('success', $newsRepository->all());
        } else {
            return $apiService->success('success', $newsRepository->groupByTag($groupBy, $tagsRepository, $sourceRepository));
        }
    }
}
