<?php

abstract class Assessment {
    private $assessmentID, $assessmentTypeID, $studentID, $questionsCorrect, 
            $questionsWrong, $start, $end, $level;
    
    function __construct($assessmentTypeID, $studentID, $questionsCorrect, 
            $questionsWrong, $start, $end, $level) {
        $this->assessmentTypeID = $assessmentTypeID;
        $this->studentID = $studentID;
        $this->questionsCorrect = $questionsCorrect;
        $this->questionsWrong = $questionsWrong;
        $this->start = $start;
        $this->end = $end;
        $this->level = $level;
    }
    function getAssessmentID() {
        return $this->assessmentID;
    }

    function getAssessmentTypeID() {
        return $this->assessmentTypeID;
    }

    function getStudentID() {
        return $this->studentID;
    }

    function getQuestionsCorrect() {
        return $this->questionsCorrect;
    }

    function getQuestionsWrong() {
        return $this->questionsWrong;
    }

    function getStart() {
        return $this->start;
    }

    function getEnd() {
        return $this->end;
    }

    function getLevel() {
        return $this->level;
    }

    function setAssessmentTypeID($assessmentTypeID): void {
        $this->assessmentTypeID = $assessmentTypeID;
    }

    function setStudentID($studentID): void {
        $this->studentID = $studentID;
    }

    function setQuestionsCorrect($questionsCorrect): void {
        $this->questionsCorrect = $questionsCorrect;
    }

    function setQuestionsWrong($questionsWrong): void {
        $this->questionsWrong = $questionsWrong;
    }

    function setStart($start): void {
        $this->start = $start;
    }

    function setEnd($end): void {
        $this->end = $end;
    }

    function setLevel($level): void {
        $this->level = $level;
    }

    abstract public function getScore();
        
}
