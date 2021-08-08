<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\GroupNewsRequest;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use App\Repositories\TagsRepository;
use App\Services\ApiService;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews(GroupNewsRequest $groupNewsRequest, Request $request, NewsService $newsService, NewsRepository $newsRepository, ApiService $apiService, TagsRepository $tagsRepository, SourceRepository $sourceRepository){
        $groupNewsRequest->validated($this, $request);
        return $newsService->getNews($request?->groupBy, $newsRepository, $apiService, $tagsRepository, $sourceRepository);
    }
}
