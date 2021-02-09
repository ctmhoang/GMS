<?php

interface IUserDao
{
    public function fetchAll(): array;

    public function findById(int $id): ?array;

    public function validateUser(string $usr, string $pwd): ?array;

    public function insert(array $data): int;

    public function update(int $id, array $data): int;

    public function delete(string $sql, int $id) : int;
}