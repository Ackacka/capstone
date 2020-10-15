<?php

class Student extends User{
    private $level;
    private $classroomID;
    
    public function __construct($firstName, $lastName, $username, $password, $level, $classroomID) {
        $this->level = $level;
        $this->classroomID = $classroomID;
        parent::__construct($firstName, $lastName, $username, $password, 1);
    }
    
    function getLevel() {
        return $this->level;
    }

    function setLevel($level): void {
        $this->level = $level;
    }

    function getClassroomID() {
        return $this->classroomID;
    }

    function setClassroomID($classroomID): void {
        $this->classroomID = $classroomID;
    }


}
