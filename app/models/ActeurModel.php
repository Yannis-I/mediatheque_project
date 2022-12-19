<?php

namespace app\models;

class ActeurModel extends HumanModel {
    private string $role = 'ACTOR';

    public function getRole():string{
        return $this->role;
    }

    public function setRole(string $role):self{
        $this->role = $role;
        return $this;
    }
}

?>