<?php
namespace App\Repositories\Interfaces;

interface TagsRepositoryInterface
{
    public function all(): mixed;
    public function getNameById($id): string;
}
