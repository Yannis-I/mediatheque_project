<?php

namespace app\dao;

interface InterfaceDAO {

    public function findByID(int $id):object;

    public function findAll(): array;

    public function writeDB(Object $value): int;

    public function updateDB(object $value): void;

    public function deleteDB(int $id): void;

}

?>