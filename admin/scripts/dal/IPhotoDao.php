<?php
interface IPhotoDao{
    public function fetchAll(): array;

    public function findById(int $id): ?array;

    public function insert(array $data): int;

    public function update(int $id, array $data): int;

    public function delete(int $id) : int;

    public function getRange(int $offset, int $perPage) : array;
}