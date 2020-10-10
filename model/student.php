<?php

class Student extends User{
    private $userRole;
    private $level;
    
    public function __construct($firstName, $lastName, $username, $password, $userRole) {
        $this->level = 1;
        $this->userRole = $userRole;
        parent::__construct($firstName, $lastName, $username, $password);
    }
    
    function getUserRole() {
        return $this->userRole;
    }

    function setUserRole($userRole): void {
        $this->userRole = $userRole;
    }

    function getLevel() {
        return $this->level;
    }

    function setLevel($level): void {
        $this->level = $level;
    }


}
