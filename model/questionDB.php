<?php

class QuestionDB {
    public static function getRandomQuestion($difficulty, $category) {
        $db = Database::getDB();
        $query = 'SELECT * FROM questions
                WHERE difficulty = :difficulty
                AND category = :category
                ORDER BY RAND()
                LIMIT 1';
        $statement = $db->prepare($query);
        $statement->bindValue(":difficulty", $difficulty);
        $statement->bindValue(":category", $category);        
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        $question = new Question($row['difficulty'],
                                $row['category'],
                                $row['question'],
                                $row['answer']);
        $question->setQuestionID($row['questionID']);
        
        return $question;
    }
    
    //OTHER CRUD
}
