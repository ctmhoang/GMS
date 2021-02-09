<?php

interface IUserDao
{
    public function fetchAll(): array;

    public function findById(int $id): ?array;

    public function validateUser(string $usr, string $pwd): ?array;

    public function insert(User $user): int;

    public function update(string $id, array $data): int;

    public function delete(string $sql, int $id) : int;
}