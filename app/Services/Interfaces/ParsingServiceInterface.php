<?php
namespace App\Services\Interfaces;

use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use App\Repositories\TagsRepository;

interface ParsingServiceInterface
{
    public function parseAndSaveNews(TagsRepository $tagsRepository, NewsRepository $newsRepository, SourceRepository $sourceRepository) : bool;
}
