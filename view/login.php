<?php 

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MathQuiz - Log In/Registration</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <h1>User Login</h1>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="userLogin">

            <fieldset> 
                <legend>User Login</legend>        

                <label>Username:  </label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span class="errorMsg"> <?php echo $usernameError ?></span> 
                <br>

                <label>Password: </label>
                <input type="password" name="password">
                <span class="errorMsg"> <?php echo $passwordError ?></span> 

            </fieldset>
            <br>
            <input type="submit" value="Submit">
            <br>

        </form>
        
        <p><a href="index.php?action=showAddUser">Register</a><br></p>
    </body>
</html>
