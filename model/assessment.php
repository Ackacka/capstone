<?php

abstract class Assessment {
    private $assessmentID, $assessmentTypeID, $studentID, $questionsCorrect, 
            $questionsWrong, $start, $end, $difficulty, $questions;
    
    function __construct($assessmentTypeID, $studentID, $difficulty, $questions) {
        $this->assessmentTypeID = $assessmentTypeID;
        $this->studentID = $studentID;
        $this->questionsCorrect = $questionsCorrect;
        $this->questionsWrong = $questionsWrong;
        $this->start = $start;
        $this->end = $end;
        $this->difficulty = $difficulty;
        $this->questions = $questions;
    }
    
    function getQuestions() {
        return $this->questions;
    }

    function setQuestions($questions): void {
        $this->questions = $questions;
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

    function getDifficulty() {
        return $this->difficulty;
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

    function setDifficulty($difficulty): void {
        $this->difficulty = $difficulty;
    }

    abstract public function getScore();
        
}
