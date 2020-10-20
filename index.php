<!DOCTYPE html>
<?php 
if(isset($error_message)){
    var_dump($error_message);
}

$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
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
require_once './model/validation.php';



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
            $level = StudentDB::getStudentLevel($username);
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
        $username = $_SESSION['loginUser'];
        $level = StudentDB::getStudentLevel($username);
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
        $_SESSION['questions'] = serialize($questions);
        $quiz = new Quiz($userID, 1, $questions);
        $level = StudentDB::getStudentLevel($username);

        $assessmentID = QuizDB::addQuiz($quiz);
        include './view/quizPage.php';
        die();
        break;
    case "resultsPage":   
        $username = $_SESSION['loginUser'];
        $questions = unserialize($_SESSION['questions']);
        $answers = $_POST['answers'];
        $totalCorrect = 0;
        $quizID = $_POST['quizID'];
        $dt = date('Y-m-d h:i:s');
        
        //check answers, however many
        for ($i = 0; $i < count($questions); $i++){
            if($questions[$i]->getAnswer() === $answers[$i]){
                $totalCorrect++;
            }
        }
        
        $passFail = 0;
        if (($totalCorrect / count($questions)) >= .70) {
            $passFail = 1;
        }
        QuizDB::updateQuiz($quizID, $totalCorrect, $questions, $dt);
        QuizDB::passOrFailQuiz($quizID, $passFail);
        
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
        
        $passwordError ='';
        $pwdHash = Validation::passwordValidation($password);
        if ($pwdHash === false) {
            $passwordError .= "Password requires a digit, an uppercase letter, and must be 8+ characters long" . "\n";
        }


        //write user information to database
        if ($usernameError !== '' || $passwordError !== '' || $firstNameError !== '' || $lastNameError !== '') {
            include("./view/addUser.php");
            die();
        } else {
            
            if ($userType === "student") {
//                $roleTypeID = 1;
                $level = 1;
                $classroomID = -1;
                $user = new Student($firstName, $lastName, $username, $pwdHash, $level, $classroomID);
                $userID = StudentDB::addStudent($user);
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
            include "./view/login.php";
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
