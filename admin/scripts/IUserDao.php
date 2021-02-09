<?php

interface IUserDao
{
    public function fetchAll(): array;

    public function findById(int $id): ?array;

    public function validateUser(string $usr, string $pwd) : ?array;
}