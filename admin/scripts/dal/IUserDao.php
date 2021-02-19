<?php

/**
 * Interface IUserDao
 */
interface IUserDao
{
    /**
     * return all the records of the table
     * and put them all in one array
     * @return array of array has info of all of the the users
     */
    public function fetchAll(): array;

    /**
     * Get a record in the USER table
     * @param int $id of the User
     * @return array|null return data related with the record in one array if User's id does not
     * existed return null
     */
    public function findById(int $id): ?array;

    /**
     * Validate the user
     * @param string $usr username
     * @param string $pwd password
     * @return array|null array of the data if the username and password are matched
     * otherwise return null
     */
    public function validateUser(string $usr, string $pwd): ?array;

    /**
     * Insert a record into USER table
     * @param array $data of a record with specified args
     * @return int number of affected rows
     */
    public function insert(array $data): int;

    /**
     * Update the record with specified Id by data in args array
     * @param int $id Id of the User
     * @param array $data of the entry in the record wanna changed
     * @return int number of the affected rows
     */
    public function update(int $id, array $data): int;

    /**
     * Delete a record in the USER table
     * @param int $id of the User
     * @return int return number of affected rows
     */
    public function delete(int $id): int;
}