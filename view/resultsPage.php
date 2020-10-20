<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MathWhiz</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/9c754b173e.js" crossorigin="anonymous"></script>

    </head>
    <body>
       <?php if (!isset($username)) {$username = '';} ?>
       <?php include_once('navigation.php'); ?> 

        <div class="main">
            <div class="container mt-5">
                <div class="border" >
                    <div class="text-center p-3 border-bottom" style="background-color: rgba(144, 238, 144, 0.3);">
                        <h2>Quiz Results</h2>
                    </div>
                    <div class="text-center p-3 border-bottom" style="height: 300px;">
                        <?php if ($passFail == 1) { ?>
                        <h3 style="color: green;">You Passed!</h3>
                        <?php } else { ?>
                        <h3 style="color: red;">You Failed!</h3>
                        <?php } ?>                       
                        <br>
                        <p style="font-size: 80px; font-weight: bold;"><?php echo htmlspecialchars($percentage); ?>%</p>
                        <p style="font-size: 20px;"><?php echo htmlspecialchars ($totalCorrect)?> out of 10</p>
                    </div>
                </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
