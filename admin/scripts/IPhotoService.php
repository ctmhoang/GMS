<?php
interface IPhotoService{
    public function fetchAll(): array;

    public function findById(int $id):Photo;

    public function save(array $data, int $id = -1) : int;

    public function del(Photo $photo) : bool;

    public function getRange(int $offset, int $perPage, array $data=[]) : array;
}