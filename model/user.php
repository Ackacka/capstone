<?php

abstract class User {

    private $userID, $firstName, $lastName, $username, $password, $roleTypeID;

    public function __construct($firstName, $lastName, $username, $password, $roleTypeID) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->roleTypeID = $roleTypeID;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function getRoleTypeID() {
        return $this->roleTypeID;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function setRoleTypeID($roleTypeID) {
        $this->roleTypeID = $roleTypeID;
    }

}
