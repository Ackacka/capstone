<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <div class="container">
            <h1>Account Sign Up</h1>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="addUser">
                
                <legend>User Registration</legend>
                
                <?php if (isset($message)) { ?>
                <p class="error"><?php echo nl2br(htmlspecialchars($message)) ?></p>
                <?php } ?>
                
                <div class="form-group">
                    <label for="firstName">First name:  </label>
                    <input type="text" class="form-control" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" placeholder="Enter First Name" id="firstName">
                    <span class="errorMsg error"> <?php echo htmlspecialchars($firstNameError) ?></span>
                </div>
                <div class="form-group">
                    <label for="lastName">Last name:  </label>
                    <input type="text" class="form-control" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" placeholder="Enter Last Name" id="lastName">
                    <span class="errorMsg error"> <?php echo htmlspecialchars($lastNameError) ?></span>
                </div>
                 <div class="form-group">
                    <label for="username">Username:  </label>
                    <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter username" id="username">
                    <span class="errorMsg error"> <?php echo htmlspecialchars($usernameError) ?></span>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:  </label>
                    <input  type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter Password" id="pwd">
                    <span class="errorMsg error"> <?php echo htmlspecialchars($passwordError) ?></span>
                </div>

                <div class="form-group">
                    <input  type="radio" id="rbStudent" name="userType" value="student" checked>
                    <label for="rbStudent">Student</label><br>
                    <input  type="radio" id="rbTeacher" name="userType" value="teacher" >
                    <label for="rbTeacher">Teacher</label><br>
                    <input  type="radio" id="rbParent" name="userType" value="parent" >
                    <label for="rbParent">Parent</label><br>
                    <input  type="radio" id="rbParent" name="userType" value="admin" >
                    <label for="rbAdmin">Admin</label><br>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <button type="submit" class="btn btn-success ml-auto">Submit</button>
                </div> 
                <br>
            </form>
        </div>
    </body>
</html>
