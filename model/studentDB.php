<?php

class StudentDB {

    public static function addStudent($user) {
         $db = Database::getDB();

        $level = $user->getLevel();
        $classroomID = $user->getClassroomID();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $username = $user->getUsername();        
        $password = $user->getPassword();
        $roleTypeID = $user->getRoleTypeID();

        try {
            // Add the user to the database  
            $query = 'INSERT INTO users
                     (firstName, lastName, username, password, roleTypeID)
                  VALUES
                     (:firstName, :lastName, :username, :password, :roleTypeID)';
            $statement = $db->prepare($query);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':roleTypeID', $roleTypeID);
            $statement->execute();
            $statement->closeCursor();
            
            $userID = $db->lastInsertId();
            
            $query = 'INSERT INTO students
                        (userID, level, classroomID)
                     VALUES
                        (:userID, :level, :classroomID)';
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':level', $level);
            $statement->bindValue(':classroomID', $classroomID);
            $statement->execute();
            $statement->closeCursor();
            
            $query = 'INSERT INTO classrooms
                        (classroomID, studentID)
                      VALUES
                        (:classroomID, :userID)';
            $statement = $db->prepare($query);
            $statement->bindValue(':classroomID', $classroomID);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $statement->closeCursor();
            
            
            return $userID;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
}

