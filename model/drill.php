<?php


class Drill extends Assessment {
    public function __construct($assessmentID, $assessmentTypeID, $studentID, $questionsCorrect, $questionsWrong, $start, $end, $level) {        
        parent::__construct($assessmentID, $assessmentTypeID, $studentID, $questionsCorrect, $questionsWrong, $start, $end, $level);
    }
    
    public function getScore(){
        $score = $this->questionsCorrect / ($this->questionsCorrect + $this->questionsWrong);
        return $score;
    }
}


