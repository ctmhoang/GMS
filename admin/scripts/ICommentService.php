<?php
require_once 'Comment.php';

interface  ICommentService
{
    public function fetchAll(): array;

    public function fetchAllByPid(int $id): array;

    public function insert(Comment $comment): int;

    public function deleteRange(int $pid) : bool;

    public function isCommentWithIdExisted(int $id):bool;

    public function deleteById(int $id):bool;

    public function get(int $id) : ?Comment;
}