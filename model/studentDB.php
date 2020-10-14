<?php

class StudentDB {

    public static function addStudent($user,$userID) {
         $db = Database::getDB();

        $level = $user->getLevel();
        $classroomID = $user->getclassroomID();
                       
        try {           
            // Add the user to the database                      
            $query = "INSERT INTO students (userID, level, classroomID)
                VALUES (:userID, :level, :classroomID)";
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':level', $level);
            $statement->bindValue(':classroomID', $classroomID);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
}

