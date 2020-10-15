<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MathWhiz</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/9c754b173e.js" crossorigin="anonymous"></script>
        
        <script type="text/javascript"> 
            var timerVar = setInterval(countTimer, 1000); //countimer function is called by setInterval function every second
            var totalSeconds = 0;
            function countTimer() {
                ++totalSeconds;
                var hour = Math.floor(totalSeconds /3600); //count hour
                var minute = Math.floor((totalSeconds - hour*3600)/60); //count minute. subtract hours sechonds from total seconds
                var seconds = totalSeconds - (hour*3600 + minute*60); //count seconds. subract hours and minutes seconds from total seconds
                document.getElementById("timer").innerHTML = hour + ":" + minute + ":" + seconds; //put the result in a div called timer.
            }
        </script>
        
    </head>
    <body onload=display_ct();>
        <?php include_once('navigation.php'); ?>
        <!-- Page content -->
        <div class="main">
            <div class="container mt-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-10 col-lg-10">
                        <div class="border">               
                            <div class="question bg-white p-3 border-bottom">                               
                                <div class="d-flex flex-row justify-content-between align-items-center mcq">
                                    <h4>Quiz Level (insert level)</h4>
                                    <span id="timer" style="color: red; font-size: 30px;"></span>         
                                </div>
                                <form method="post" action="index.php">
                                        <input type="hidden" name="action" value="resultsPage">
                                <?php for ($i = 0; $i < count($questions); $i++) { ?>

                                </div>
                                <div class="question bg-white p-3 border-bottom">
                                    <div class="d-flex flex-row align-items-center question-title">
                                        <h3 class="text-danger">Q.<?php echo htmlspecialchars($i + 1) ?></h3>
                                        <h5 class="mt-1 ml-2">&nbsp;<?php echo htmlspecialchars($questions[$i]->getQuestion()); ?>&nbsp;= ?</h5>
                                    </div>
                                    <div class="ans ml-2">
                                        <label> Answer: <input type="text" name="answers[]"  value=""></label>
<!--                                        <input type="hidden" name="correctAnswer
                                            <?php // echo htmlspecialchars($i + 1) ?>
                                               " value="
                                                   <?php // echo htmlspecialchars($questions[$i]->getAnswer()); ?>
                                               ">-->
                                    </div>                     
                                <?php } ?>                        
                            </div>

                            <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                                <button class="btn btn-primary border-success align-items-center btn-success ml-auto" type="submit" value=''>Submit
                                    <i class="fa fa-angle-right ml-2"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>

