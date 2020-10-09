
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Badcanp</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<!-- the body section -->
<body>
<header><h1>Badcanp</h1></header>

<main>
    <h1>User Registration Successful</h1>
    
    <h4><?php echo "Thank you " . htmlspecialchars($user->getUsername()) . ".<br>" . "You have been registered." ?></h4>
    <br>
    
    <p><a href="index.php?action=loginPage">Back to the home page</a></p>   
    </main>    
</body>
</html>
