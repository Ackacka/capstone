<?php

class Student extends User{
    private $userRole;
    
    public function __construct($firstName, $lastName, $username, $password, $userRole) {
        $this->userRole = $userRole;
        parent::__construct($firstName, $lastName, $username, $password);
    }
    
    function getUserRole() {
        return $this->userRole;
    }

    function setUserRole($userRole): void {
        $this->userRole = $userRole;
    }


}
