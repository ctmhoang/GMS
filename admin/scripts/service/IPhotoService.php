<?php
/** @define "__ROOT__" "/opt/lampp/htdocs/GMS/admin/scripts" */
require_once(dirname(__FILE__, 2) . '/utils/config.php');

require_once __ROOT__ . '/bean/Photo.php';

interface IPhotoService
{
    public function fetchAll(): array;

    public function findById(int $id): Photo;

    public function save(array $data, int $id = -1): int;

    public function del(Photo $photo): bool;

    public function getRange(int $offset, int $perPage, array $data = []): array;
}