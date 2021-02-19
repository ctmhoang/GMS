<?php
/** @define "__ROOT__" "/opt/lampp/htdocs/GMS/admin/scripts" */
require_once(dirname(__FILE__, 2) . '/utils/config.php');

require_once __ROOT__ . '/bean/User.php';

interface IUserService
{
    public function fetchAll(): array;

    public function findById(int $id): User;

    public function GetInfo(string $usr, string $pwd): ?User;

    public function save(array $data, int $id = -1): int;

    public function del(User $user): bool;
}