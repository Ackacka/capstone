<?php 

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Template - Log In/Registration</title>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
        <script src="https://kit.fontawesome.com/9c754b173e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">            
	<img src="images/student.png"/>
		<form method=""post" action="index.php">
                    <input type="hidden" name="action" value="userLogin">
			<div class="form-input">                           
                            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter Your User Name"/>
                            <span class="errorMsg"> <?php echo $usernameError ?></span> 
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Enter Your Password"/>
                                <span class="errorMsg"> <?php echo $passwordError ?></span>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>                       
		</form>
        
                <p><a href="index.php?action=showAddUser">Register</a><br></p>
	</div>
    </body>
</html>
