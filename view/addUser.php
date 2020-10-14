<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template</title>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <h1>Account Sign Up</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="addUser">

    <fieldset> 
    <legend>User Registration</legend>
    
        <label>First name:  </label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>">
        <span class="errorMsg"> <?php echo htmlspecialchars($firstNameError) ?></span> 
        <br> 
        
        <label>Last name:  </label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">
        <span class="errorMsg"> <?php echo htmlspecialchars($lastNameError) ?></span> 
        <br>    
    
        <label>Username:  </label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <span class="errorMsg"> <?php echo htmlspecialchars($usernameError) ?></span> 
        <br>        
        
        <label>Password: </label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        <span class="errorMsg"> <?php echo htmlspecialchars($passwordError) ?></span> 
        <br><span class="errorMsg"><?php echo htmlspecialchars($pwdCapital)?></span>
        <br><span class="errorMsg"><?php echo htmlspecialchars($pwdLower)?></span>
        <br><span class="errorMsg"><?php echo htmlspecialchars($pwdNum)?></span>
        <br><span class="errorMsg"><?php echo htmlspecialchars($pwdNonword)?></span>   
        <br>   
        
        <label> <input type="radio" name="userType" value="student" checked> 
            <span>Student</span>
        </label><br>
        <label> <input type="radio" name="userType" value="teacher"> 
            <span>Teacher</span>
        </label><br>
        <label> <input type="radio" name="userType" value="parent"> 
            <span>Parent</span>
        </label><br>
        <label> <input type="radio" name="userType" value="admin"> 
            <span>Admin</span>
        </label>
        
<!--        <input  type="radio" id="rbStudent" name="userType" value="student" checked>
        <label for="rbStudent">Student</label><br>
        <input  type="radio" id="rbTeacher" name="userType" value="teacher" >
        <label for="rbTeacher">Teacher</label><br>
        <input  type="radio" id="rbParent" name="userType" value="parent" >
        <label for="rbParent">Parent</label><br>
        <input  type="radio" id="rbParent" name="userType" value="admin" >
        <label for="rbAdmin">Admin</label><br>-->
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
