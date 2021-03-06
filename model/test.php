<?php

class Test extends Assessment {
    private $passFail;
    
    public function __construct($assessmentID, $assessmentTypeID, $studentID, $questionsCorrect, $questionsWrong, $start, $end, $level, $passFail) {
        $this->passFail = $passFail;
        parent::__construct($assessmentID, $assessmentTypeID, $studentID, $questionsCorrect, $questionsWrong, $start, $end, $level);
    }
    
    function getPassFail() {
        return $this->passFail;
    }

    function setPassFail($passFail): void {
        $this->passFail = $passFail;
    }
    
    public function getScore(){
        $score = $this->questionsCorrect / ($this->questionsCorrect + $this->questionsWrong);
        return $score;
    }
    
    function changeLevel(){} //not sure if this function actually belongs in this class. Belong in student class?

}
