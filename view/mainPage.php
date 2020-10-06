<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MathWhiz</title>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <h2>Did you hear about the mathematician who is afraid of negative numbers?</h2>

        <h4>She’d stop at nothing to avoid them.</h4>        
        
        <a href="index.php?action=loginPage">Login/Register</a>
        <br>
        <br>
        
        <?php if($_SESSION['loginUser'] !== 'defaultUser') { ?>
            <p class="loggedInAs">Logged in as <em><?php echo $_SESSION['loginUser']; ?></em></p>
            <a href="index.php?action=logOut">Log out</a>
        <?php } ?>
    </body>
</html>
