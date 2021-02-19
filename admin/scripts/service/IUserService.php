<?php
/** @define "__ROOT__" "/opt/lampp/htdocs/GMS/admin/scripts" */
require_once(dirname(__FILE__, 2) . '/utils/config.php');

require_once __ROOT__ . '/bean/User.php';

/**
 * Interface IUserService
 */
interface IUserService
{
    /**
     * Get all the data in the db
     * @return array of User Object
     */
    public function fetchAll(): array;

    /**
     * Get a User Object with specified Id
     * @param int $id of the Photo
     * @return User Object with specified If
     */
    public function findById(int $id): User;

    /** Check if user existed
     * @param string $usr username
     * @param string $pwd password
     * @return User|null Instance if the user with usr and pwd exists
     * Otherwise return null
     */
    public function GetInfo(string $usr, string $pwd): ?User;

    /**
     * Handle both insert and update operator
     * if $id is specified => update if not insert
     * @param array $data set of User Object wanna save
     * @param int $id of the User Object if wanna update
     * @return int number of affected  rows
     */
    public function save(array $data, int $id = -1): int;

    /**
     * Delete User from db
     * @param User $user wanna delete
     * @return bool true if success otherwise false
     */
    public function del(User $user): bool;
}