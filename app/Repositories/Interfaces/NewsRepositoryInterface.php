<?php
namespace App\Repositories\Interfaces;

use App\Repositories\SourceRepository;
use App\Repositories\TagsRepository;

interface NewsRepositoryInterface
{
    public function all(): mixed;
    public function getLatestNewsTime($tag_id): mixed;
    public function countByTag($tag_id): int;
    public function createNews($array, $source_id, $tag_id): mixed;
    public function getDateForNewNews($tag_id): mixed;
    public function groupByTag($groupBy, TagsRepository $tagsRepository, SourceRepository $sourceRepository): mixed;
}
