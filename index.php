<!DOCTYPE html>
<?php 
if(isset($error_message)){
    var_dump($error_message);
}

$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
//session_set_cookie_params($lifetime, '/');
//session_start();
if(session_id() == ''){
      session_start();
      setcookie(session_name(),session_id(),time()+$lifetime);
   }

require_once './model/database.php';
require_once './model/user.php';
require_once './model/student.php';
require_once './model/studentDB.php';
require_once './model/userDB.php';
require_once './model/assessment.php';
require_once './model/quiz.php';
require_once './model/quizDB.php';
require_once './model/question.php';
require_once './model/questionDB.php';



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
            
            include './view/dashboard.php';
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
    case "dashboard":
        
        include './view/dashboard.php';
        die();
        break;
    case "quizPage":
        $username = $_SESSION['loginUser'];
        $user = UserDB::getUserByUsername($username);
        $userID = $user['userID'];
        $questions = array(); 
        for ($i = 0; $i < 10; $i++){
            $question = QuestionDB::getRandomQuestion(1, 'Addition');
            array_push($questions, $question);           
        }
        $quiz = new Quiz($userID, 1, $questions);
//        var_dump($quiz);
        QuizDB::addQuiz($quiz);
        include './view/quizPage.php';
        die();
        break;
    case "resultsPage":
        $totalCorrect = 0;
        $answer1 = filter_input(INPUT_POST, 'answer1');
        $answer2 = filter_input(INPUT_POST, 'answer2');
        $answer3 = filter_input(INPUT_POST, 'answer3');
        $answer4 = filter_input(INPUT_POST, 'answer4');
        $answer5 = filter_input(INPUT_POST, 'answer5');
        $answer6 = filter_input(INPUT_POST, 'answer6');
        $answer7 = filter_input(INPUT_POST, 'answer7');
        $answer8 = filter_input(INPUT_POST, 'answer8');
        $answer9 = filter_input(INPUT_POST, 'answer9');
        $answer10 = filter_input(INPUT_POST, 'answer10');
        
        $correctAnswer1 = filter_input(INPUT_POST, 'correctAnswer1');
        $correctAnswer2 = filter_input(INPUT_POST, 'correctAnswer2');
        $correctAnswer3 = filter_input(INPUT_POST, 'correctAnswer3');
        $correctAnswer4 = filter_input(INPUT_POST, 'correctAnswer4');
        $correctAnswer5 = filter_input(INPUT_POST, 'correctAnswer5');
        $correctAnswer6 = filter_input(INPUT_POST, 'correctAnswer6');
        $correctAnswer7 = filter_input(INPUT_POST, 'correctAnswer7');
        $correctAnswer8 = filter_input(INPUT_POST, 'correctAnswer8');
        $correctAnswer9 = filter_input(INPUT_POST, 'correctAnswer9');
        $correctAnswer10 = filter_input(INPUT_POST, 'correctAnswer10');
        
        if($answer1 === $correctAnswer1){ $totalCorrect++;}
        if($answer2 === $correctAnswer2){ $totalCorrect++;}
        if($answer3 === $correctAnswer3){ $totalCorrect++;}
        if($answer4 === $correctAnswer4){ $totalCorrect++;}
        if($answer5 === $correctAnswer5){ $totalCorrect++;}
        if($answer6 === $correctAnswer6){ $totalCorrect++;}
        if($answer7 === $correctAnswer7){ $totalCorrect++;}
        if($answer8 === $correctAnswer8){ $totalCorrect++;}
        if($answer9 === $correctAnswer9){ $totalCorrect++;}
        if($answer10 === $correctAnswer10){ $totalCorrect++;}
        include './view/resultsPage.php';
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
        if ($username == '') { 
            $usernameError = 'Username is required.';
        } else if (strlen($username) < 4 || strlen($username) > 30) {
            $usernameError = 'Username must be between 4 and 30 characters';
        } else if (!preg_match('/^[A-Za-z]/', $username)) {
            $usernameError = 'Username must start with a letter';
        } else if (UserDB::uniqueUsernameTest($username) === false) {
            $usernameError = 'Username already taken.';
        } else {
            $usernameError = '';
        } 
        
        $firstNameError = '';
        if ($firstName == '') { 
            $firstNameError = 'First name is required.';
        } else if (strlen($lastName) > 60) {
            $firstNameError = 'First name must be less than 60 characters.';
        } else {
            $firstNameError = '';
        }
        
        $lastNameError = '';
        if ($lastName == '') { 
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
//                $roleTypeID = 1;
                $level = 1;
                $classroomID = -1;
                $user = new Student($firstName, $lastName, $username, $pwdHash, $level, $classroomID);
                $userID = StudentDB::addStudent($user);
//                ClassroomDB::addStudent($userID, $user);
//                StudentDB::addStudent($user, (int)$userID);
                
//                StudentDB::addStudent($user);
            }elseif($userType === "teacher") {
                $roleTypeID = 2;
                $user = new Teacher($firstName, $lastName, $username, $pwdHash, $roleTypeID);
                $userID = UserDB::addUser($user);
                TeacherDB::addTeacher($userID, $user);
            }elseif ($userType === "parent") {
                $roleTypeID = 3;
                $user = new Parent($firstName, $lastName, $username, $pwdHash, $roleTypeID);
                $userID = UserDB::addUser($user);
            }else {
                $roleTypeID = 4;
                $user = new Admin($firstName, $lastName, $username, $pwdHash, $roleTypeID);
                $userID = UserDB::addUser($user);
            }
            include "./view/confirmation.php";
            die(); 
        }
         
        break;
    case "logOut":
        $_SESSION['loginUser'] = 'defaultUser';        
        include "./view/mainPage.php";
        die();
        break;
}
?>
