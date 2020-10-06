<!DOCTYPE html>
<?php 
//var_dump($error_message);
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

require_once './model/database.php';
require_once './model/user.php';
require_once './model/student.php';
require_once './model/userDB.php';

if (empty($_SESSION['loginUser'])) {
    $_SESSION['loginUser'] = "defaultUser";
}

$action = filter_input(INPUT_POST, "action");
if ($action === null) {
    $action = filter_input(INPUT_GET, "action");
    if ($action === null) {
        $action = "landing";
    }
}

switch ($action) {
    case "landing":
        include 'view/frontPage.php';
        die();
        break;
    case "mainPage":
        include 'view/mainPage.php';
        die();
        break;
    case "loginPage":
        if(!isset($usernameError)){$usernameError = '';}
        if(!isset($passwordError)){$passwordError = '';}
        if(!isset($username)){$username = '';}
        if(!isset($password)) {$password = '';}
        include 'view/login.php';
        die();
        break;
    case "userLogin":
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');        
        $pwdHash = userDB::getPassword($username);


        if (password_verify($password, $pwdHash)) {
            $passwordError = "";
            $_SESSION['loginUser'] = $username;
            $user = UserDB::getUserByUsername($username);
            
            include './view/mainPage.php';
            die();
            break;
            
        } else {
            $passwordError = "Password is invalid.";
        }

        if (!isset($passwordError)) {
            $passwordError = '';
        }
        if (!isset($usernameError)) {
            $usernameError = '';
        }
        if (!isset($username)) {
            $username = '';
        }
        if (!isset($password)) {
            $password = '';
        }

        include './view/login.php';
        die();
        break;
    case "showAddUser":
        if (!isset($username)) {
            $username = '';
        }
        if (!isset($firstName)) {
            $firstName = '';
        }
        if (!isset($lastName)) {
            $lastName = '';
        }
        if (!isset($firstNameError)) {
            $firstNameError = '';
        }
        if (!isset($lastNameError)) {
            $lastNameError = '';
        }
        if (!isset($password)) {
            $password = '';
        }
        if (!isset($usernameError)) {
            $usernameError = '';
        }
        if (!isset($emailError)) {
            $emailError = '';
        }
        if (!isset($passwordError)) {
            $passwordError = '';
        }
        if (!isset($pwdCapital)) {
            $pwdCapital = '';
        }
        if (!isset($pwdLower)) {
            $pwdLower = '';
        }
        if (!isset($pwdNum)) {
            $pwdNum = '';
        }
        if (!isset($pwdNonword)) {
            $pwdNonword = '';
        }
        include 'view/addUser.php';
        die();
        break;
    case "addUser":
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $username = filter_input(INPUT_POST, 'username');        
        $password = filter_input(INPUT_POST, 'password');
        $userType = filter_input(INPUT_POST, 'userType');
        $_SESSION['loginUser'] = $username;

        $usernameError = '';
        if ($username == '') { // || strlen(trim($userName) <= 0))
            $usernameError = 'Username is required.';
        } else if (strlen($username) < 4 || strlen($username) > 30) {
            $usernameError = 'Username must be between 4 and 30 characters';
        } else if (!preg_match('/^[A-Za-z]/', $username)) {
            $usernameError = 'Username must start with a letter';
        } else if (!UserDB::uniqueUsernameTest($username) === false) {
            $usernameError = 'Username already taken.';
        } else {
            $usernameError = '';
        } 
        
        $firstNameError = '';
        if ($firstName == '') { // || strlen(trim($userName) <= 0))
            $firstNameError = 'First name is required.';
        } else if (strlen($lastName) > 60) {
            $firstNameError = 'First name must be less than 60 characters.';
        } else {
            $firstNameError = '';
        }
        
        $lastNameError = '';
        if ($lastName == '') { // || strlen(trim($userName) <= 0))
            $lastNameError = 'Last name is required.';
        } else if (strlen($lastName) > 60) {
            $lastNameError = 'Last name must be less than 60 characters.';
        } else {
            $lastNameError = '';
        }    

        $pwdCapital = "Must have a capital letter";
        $pwdLower = "Must have a lower case letter";
        $pwdNum = "Must include a number";
        $pwdNonword = "Must have a special character";
        $pwdLength = "Must be at least 8 characters long";
        $counter = 0;
        $password_valid = true;

        if (preg_match('/[A-Z+]/', $password)) {
            $counter += 1;
            $pwdCapital = "";
        }
        if (preg_match('/[a-z+]/', $password)) {
            $counter += 1;
            $pwdLower = "";
        }
        if (preg_match('/[0-9+]/', $password)) {
            $counter += 1;
            $pwdNum = "";
        }
        if (preg_match('/[\W+]/', $password)) {
            $counter += 1;
            $pwdNonword = "";
        }
        if ($counter < 3) {
            $passwordError = "Must meet at least 3 of the 4 requirements";
            $password_valid = false;
        } else {
            $pwdCapital = "";
            $pwdLower = "";
            $pwdNum = "";
            $pwdNonword = "";
            $passwordError = "";
            $password_valid = true;
        }
        if (strlen($password) < 8) {
            $passwordError = $pwdLength;
            $password_valid = false;
        } else {
            $password_valid = true;
        }

        if ($password_valid) {
            $pwdHash = password_hash($password, PASSWORD_BCRYPT);
        }


        //write user information to database
        if ($usernameError !== '' || $passwordError !== '') {
            include("./view/addUser.php");
            die();
        } else {
            if ($userType === "student") {
                $user = new Student($firstName, $lastName, $username, $pwdHash, $userType);
                UserDB::addUser($user);
                include("./view/confirmation.php");
                die();
            }
            
        }
        break;
    case "logOut":
        $_SESSION['loginUser'] = 'defaultUser';
        $_SESSION['state'] = [];
        $_SESSION['event'] = [];
        include "./view/mainPage.php";
        die();
        break;
}
?>
