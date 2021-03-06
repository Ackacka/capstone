<?php

class UserDB {

    public static function selectAll() {
        $db = Database::getDB();
        $query = 'SELECT * FROM users';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    }

    public static function getUser($userID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $userID);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
        return $user;
    }

    public static function getUserByUserName($username) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users
                  WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $user;
    }
    
    public static function getPassword($username) {
        $db = Database::getDB();
        $query = 'SELECT password FROM users
                  WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->execute();
        $password = $statement->fetch();
        $statement->closeCursor();
        if ($password === false) {
            return false;
        }
        return $password[0];
    }

    public static function uniqueUsernameTest($username) {
        $db = Database::getDB();        
        $query = 'SELECT username FROM users WHERE username = :username;';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $userRow = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
//        return $uniqueUserRow['username'] ?? false;
        if (!$userRow) {
            return true;
        }
        return false;
    }

    public static function addUser($user) {
        $db = Database::getDB();

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
            $userID = $db->lastInsertId();
            $statement->closeCursor();
            return $userID;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
}
