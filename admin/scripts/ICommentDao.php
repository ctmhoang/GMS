<?php
interface ICommentDao{
    public function fetchAllByPid(int $id) :?array;

}