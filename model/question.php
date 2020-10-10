<?php

class question {
    
    private $questionID, $difficulty, $category, $question, $answer;
    
    function __construct($difficulty, $category, $question, $answer) {
        $this->difficulty = $difficulty;
        $this->category = $category;
        $this->question = $question;
        $this->answer = $answer;
    }
    
    function getQuestionID() {
        return $this->questionID;
    }

    function getDifficulty() {
        return $this->difficulty;
    }

    function getCategory() {
        return $this->category;
    }

    function getQuestion() {
        return $this->question;
    }

    function getAnswer() {
        return $this->answer;
    }

    function setDifficulty($difficulty): void {
        $this->difficulty = $difficulty;
    }

    function setCategory($category): void {
        $this->category = $category;
    }

    function setQuestion($question): void {
        $this->question = $question;
    }

    function setAnswer($answer): void {
        $this->answer = $answer;
    }
}
