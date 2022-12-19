<?php

namespace app\models;

class DirectorModel extends HumanModel {
    private string $role = 'DIRECTOR';

    public function getRole():string{
        return $this->role;
    }
    public function setRole($role):self{
        $this->role = $role;
        return $this;
    }
}

?>