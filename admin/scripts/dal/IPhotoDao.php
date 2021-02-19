<?php

/**
 * Interface IPhotoDao
 */
interface IPhotoDao
{
    /**
     * return all the records of the table
     * and put them all in one array
     * @return array of array has info of all of the photos
     */
    public function fetchAll(): array;

    /**
     * Get a record in the PHOTO table
     * @param int $id of the Photo
     * @return array|null return data related with the record in one array if Photo's id does not
     * existed return null
     */
    public function findById(int $id): ?array;

    /**
     * Insert a record into PHOTO table
     * @param array $data of a record with specified args
     * @return int number of affected rows
     */
    public function insert(array $data): int;

    /**
     * Update the record with specified Id by data in args array
     * @param int $id Id of the Photo
     * @param array $data of the entry in the record wanna changed
     * @return int number of the affected rows
     */
    public function update(int $id, array $data): int;

    /**
     * Delete a record in the Photo table
     * @param int $id of the Photo
     * @return int return number of affected rows
     */
    public function delete(int $id): int;

    /**
     * Get set of photo using for pagination
     * @param int $offset Page started at
     * @param int $perPage number of photo per page
     * @return array a set of array has info related to photo Object
     */
    public function getRange(int $offset, int $perPage): array;
}