<?php

interface ICommentDao
{
    public function fetchAll(): array;

    public function fetchAllByPid(int $id): ?array;

    public function insert(array $data): int;

    public function deleteByPid(int $pid): int;

    public function get(int $id): ?array;

    public function deleteById(int $id): int;

}