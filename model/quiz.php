<?php


class Quiz extends Assessment {
    private $passFail;
    
    public function __construct($studentID,  $questionsCorrect, $questionsWrong,
            $start, $end, $difficulty, $questions, $passFail) {
        $this->passFail = $passFail;
        parent::__construct($assessmentTypeID = 2, $studentID, $questionsCorrect, $questionsWrong,
                $start, $end, $difficulty, $questions);
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
