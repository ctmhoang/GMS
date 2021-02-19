<?php
/** @define "__ROOT__" "/opt/lampp/htdocs/GMS/admin/scripts" */
require_once(dirname(__FILE__, 2) . '/utils/config.php');

require_once __ROOT__ . '/bean/Photo.php';

/**
 * Interface IPhotoService
 */
interface IPhotoService
{
    /**
     * Get data in the db
     * @return array of Photo Object
     */
    public function fetchAll(): array;

    /**
     * Get a Photo Object with specified Id
     * @param int $id of the Photo
     * @return Photo Object with specified If
     */
    public function findById(int $id): Photo;

    /**
     * Handle both insert and update operator
     * if $id is specified => update if not insert
     * @param array $data set of Photo Object wanna save
     * @param int $id of the Photo Object if wanna update
     * @return int number of affected  rows
     */
    public function save(array $data, int $id = -1): int;

    /**
     * Delete Photo from db
     * @param Photo $photo need to delete
     * @return bool true if success otherwise false
     */
    public function del(Photo $photo): bool;

    /**
     * Get set of Photo Object using for pagination
     * has 2 mode:
     * Local : if data is set
     * Default: fetch directly from db
     * @param int $offset Page started at
     * @param int $perPage number of photo per page
     * @param array $data use local data if specified
     * @return array a set of array has info related to photo Object
     */
    public function getRange(int $offset, int $perPage, array $data = []): array;
}