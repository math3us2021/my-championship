<?php

namespace App\Repositories\Protocols;

interface TeamRepositoryInterface
{
    public function getAll(): array;
    public function getById(string $id): ?array;
    public function create(string $name): ?array;
}
