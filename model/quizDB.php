<?php

class QuizDB {
    public static function addQuiz($quiz) {
        $db = Database::getDB();
        
        //
        //inserts into assessment the assessmentTypeID, userID, and level (difficulty).
        //inserts into quiz a new row with just the assessmentID generated by the 
        //previous insert statement and sql auto-increment, and a null value in passFail.
            $assessmentTypeID = $quiz->getAssessmentTypeID();
            $userID = $quiz->getStudentID();
            $level = $quiz->getDifficulty();
        
        try { //got some weird errors  when working on try, will get to later
            $query = 'INSERT INTO assessment
                        (assessmentTypeID, userID, level)
                      VALUES
                        (:assessmentTypeID, :userID, :level)';
            $statement = $db->prepare($query);
            $statement->bindValue(':assessmentTypeID', $assessmentTypeID);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':level', $level);
            $statement->execute();
            $statement->closeCursor();

            $assessmentID = $db->lastInsertId();


            $query = 'INSERT INTO quiz
                        (assessmentID)
                     VALUES
                        (:assessmentID)';
            $statement = $db->prepare($query);
            $statement->bindValue(':assessmentID', $assessmentID);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
        
        
        
                
    }
    
    public static function getQuiz($quizID){
        $db = Database::getDB();
        $query = 'SELECT * FROM assessment a
                  INNER JOIN quiz q ON a.assessmentID = q.assessmentID
                  WHERE assessmentID = :assessmentID';
        $statement = $db->prepare($query);
        $statement->bindValue(":assessmentID", $quizID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
    }
}
