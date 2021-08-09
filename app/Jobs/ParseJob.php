<?php

namespace App\Jobs;
use App\Repositories\NewsRepository;
use App\Repositories\SourceRepository;
use App\Repositories\TagsRepository;
use App\Services\ParsingService;

class ParseJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Метод запускает парсинг новостей
     */
    public function handle(ParsingService $parsingService, TagsRepository $tagsRepository, NewsRepository $newsRepository, SourceRepository $sourceRepository)
    {
        $parsingService->parseAndSaveNews($tagsRepository, $newsRepository, $sourceRepository);
    }
}
