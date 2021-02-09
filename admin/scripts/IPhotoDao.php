<?php
interface IPhotoDao{
    public function fetchAll(): array;

    public function findById(int $id): ?array;

    public function insert(Photo $photo): int;

    public function update(int $id, array $data): int;

    public function delete(string $sql, int $id) : int;
}