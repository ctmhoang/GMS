<?php
require_once 'Comment.php';

interface  ICommentService{
    public function fetchAllByPid(int $id) : array;
}