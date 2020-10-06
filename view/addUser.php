<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <h1>Account Sign Up</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="addUser">

    <fieldset> 
    <legend>User Registration</legend>
    
        <label>First name:  </label>
        <input type="text" name="firstName" value="<?php echo $firstName; ?>">
        <span class="errorMsg"> <?php echo $firstNameError ?></span> 
        <br> 
        
        <label>Last name:  </label>
        <input type="text" name="lastName" value="<?php echo $lastName; ?>">
        <span class="errorMsg"> <?php echo $lastNameError ?></span> 
        <br>    
    
        <label>Username:  </label>
        <input type="text" name="username" value="<?php echo $username; ?>">
        <span class="errorMsg"> <?php echo $usernameError ?></span> 
        <br>        
        
        <label>Password: </label>
        <input type="password" name="password" value="<?php echo $password; ?>">
        <span class="errorMsg"> <?php echo $passwordError ?></span> 
        <br><span class="errorMsg"><?php echo $pwdCapital?></span>
        <br><span class="errorMsg"><?php echo $pwdLower?></span>
        <br><span class="errorMsg"><?php echo $pwdNum?></span>
        <br><span class="errorMsg"><?php echo $pwdNonword?></span>   
        <br>        
        
        <input  type="radio" id="rbStudent" name="userType" value="student" checked>
        <label for="rbStudent">Student</label><br>
        <input  type="radio" id="rbTeacher" name="userType" value="teacher" disabled>
        <label for="rbTeacher">Teacher</label><br>
        <input  type="radio" id="rbParent" name="userType" value="parent" disabled>
        <label for="rbParent">Parent</label><br>
    </fieldset>
        <br>
    <input type="submit" value="Submit">
    <br>

    </form>

    <p><a href="index.php?action=userLogin">Log In</a></p>
    <br>
    </main>			
    </body>
</html>
