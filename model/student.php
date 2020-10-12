<?php

class Student extends User{
    private $level;
    
    public function __construct($firstName, $lastName, $username, $password, $roleTypeID) {
        $this->level = 1;
        parent::__construct($firstName, $lastName, $username, $password, $roleTypeID);
    }
    
    function getLevel() {
        return $this->level;
    }

    function setLevel($level): void {
        $this->level = $level;
    }


}
