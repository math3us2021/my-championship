<?php

namespace App\Http\Protocols\team;

interface TeamServiceInterface
{
    public function get(string $id = null): array;
    public function store(string $name): array;
//    public function update(string $id, array $data): array;
//    public function delete(string $id): array;
}
