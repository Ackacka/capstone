<?php

class TeacherDB {
    public static function addTeacher($userID, $user) {
        $db = Database::getDB();
        
        $classroomID = $user->getClassroomID();
        
          try {
            // Add the student to the classroom database  
             $query = "INSERT INTO teachers 
                 (userID, classroomID)
                VALUES (:userID, :classroomID)";
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
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
