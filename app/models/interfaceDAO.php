<?php

namespace app\models;

interface InterfaceDao {
    public function writeDB():void;

    public function updateDB(): void;

    public function deleteDB(): void;


}

?>