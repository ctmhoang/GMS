<?php

/** @define "__ROOT__" "/opt/lampp/htdocs/GMS/admin/scripts" */
require_once(dirname(__FILE__, 2) . '/utils/config.php');

require_once __ROOT__ . '/bean/Comment.php';

/**
 * Interface ICommentService
 */
interface  ICommentService
{
    /**
     * Get all the data in db
     * @return array of Comment Object
     */
    public function fetchAll(): array;

    /**
     * get all comments instance in the same comment section
     * (share the same Photo ID)
     * @param int $id Photo ID
     * @return array  of Comment instance. If the comment section does not
     * have any comment or pid is not existed return empty string
     */
    public function fetchAllByPid(int $id): array;

    /**
     * Insert a Comment Instance into db
     * @param Comment $comment wanna insert
     * @return int number of affected rows
     */
    public function insert(Comment $comment): int;

    /**
     * Delete all comment if they are shared same photo Id
     * @param int $pid of the Photo
     * @return bool true if success otherwise false
     */
    public function deleteRange(int $pid): bool;

    /**
     * Check if comment Id is existed
     * @param int $id of the comment
     * @return bool true if exists false otherwise
     */
    public function isCommentWithIdExisted(int $id): bool;

    /**
     * Delete Comment from db
     * @param int $id of the Comment wanna delete
     * @return bool true if success otherwise false
     */
    public function deleteById(int $id): bool;

    /**
     * Get a Comment Object with specified Id
     * @param int $id of the Photo
     * @return Comment|null Object with specified If not return null
     */
    public function get(int $id): ?Comment;
}