<?php

namespace App\Services\Interfaces;


use App\Repositories\NewsRepository;
use App\Services\ApiService;

interface NewsServiceInterface
{
    public function getNews($groupBy, NewsRepository $newsRepository, ApiService $apiService);
}
