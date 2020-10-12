<?php

class assessmentDB {
    public static function getAssessmentQuestions($difficulty, $category, 
            $numOfQuestions) {
        $db = Database::getDB();
        $query = 'SELECT * FROM questions
                WHERE difficulty = :difficulty
                AND category = :category
                ORDER BY RAND()
                LIMIT :numOfQuestions';
        $statement = $db->prepare($query);
        $statement->bindValue(":difficulty", $difficulty);
        $statement->bindValue(":category", $category);
        $statement->bindValue(":numOfQuestions", $numOfQuestions);
        $statement->execute();
        $assessmentQuestions = $statement->fetch();
        return $assessmentQuestions;
    }
}
