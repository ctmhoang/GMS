<?php

/**
 * Interface ICommentDao
 * DAL access COMMENT table
 */
interface ICommentDao
{
    /**
     * return all the records of the table
     * and put them all in one array
     * @return array of array has info of all of the comments
     */
    public function fetchAll(): array;

    /**
     * get all comments in the same comment section
     * (share the same Photo ID)
     * @param int $id Photo ID
     * @return array  of array has info of the comment. If the comment section does not
     * have any comment or pid is not existed return empty string
     */
    public function fetchAllByPid(int $id): array;

    /**
     * Insert a record into COMMENT table
     * @param array $data of a record with specified args
     * @return int number of affected rows
     */
    public function insert(array $data): int;

    /**
     * Delete records from COMMENT if the comment in the same Comment Section
     * (Share the same Photo ID)
     * @param int $pid ID of the Photo
     * @return int number of affected rows
     */
    public function deleteByPid(int $pid): int;

    /**
     * Get a record in the COMMENT table
     * @param int $id of the Comment
     * @return array|null return data related with the record in one array if Comment's id does not
     * existed return null
     */
    public function get(int $id): ?array;

    /**
     * Delete a record in the COMMENT table
     * @param int $id of the Comment
     * @return int return number of affected rows
     */
    public function deleteById(int $id): int;

}