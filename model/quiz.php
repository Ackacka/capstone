<?php


class Quiz extends Assessment {
    private $passFail;
    
    public function __construct($studentID, $difficulty, $questions) {        
        parent::__construct($studentID, $difficulty, $questions, 2);
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
    
}
