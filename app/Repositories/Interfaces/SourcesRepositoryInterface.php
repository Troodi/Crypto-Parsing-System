<?php
namespace App\Repositories\Interfaces;

interface SourcesRepositoryInterface
{
    public function createOrUpdate($array): mixed;
    public function getNameById($id): string;
}
