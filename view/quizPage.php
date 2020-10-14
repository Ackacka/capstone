<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MathWhiz</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/9c754b173e.js" crossorigin="anonymous"></script>
        <!--        <link rel="stylesheet" type="text/css" href="css/quiz.css"/>-->

    </head>
    <body>
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
                                    <span>Count Down timer</span>
                                </div>
                                <?php for ($i = 0; $i < count($questions); $i++) { ?>
                                    <?php foreach ($questions as $q) : ?>
                                    </div>
                                    <div class="question bg-white p-3 border-bottom">
                                        <div class="d-flex flex-row align-items-center question-title">
                                            <h3 class="text-danger">Q.<?php echo htmlspecialchars($i + 1) ?></h3>
                                            <h5 class="mt-1 ml-2">&nbsp;<?php echo htmlspecialchars($q->getQuestion()); ?>&nbsp;= ?</h5>
                                        </div>
                                        <div class="ans ml-2">
                                            <label> Answer: <input type="text" name="answer"  value=""></label>
                                            <input type="hidden" name="correctAnswer" value="<?php echo htmlspecialchars($q->getAnswer()); ?>">
                                        </div> 

                                        <?php $i++;
                                    endforeach; ?>
                                <?php } ?>   
                            </div>

                            <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                                <!--                    <button class="btn btn-primary d-flex align-items-center btn-danger" type="button">
                                                        <i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;Previous</button>
                                                    <button class="btn btn-primary border-success align-items-center btn-success" type="button">Next
                                                        <i class="fa fa-angle-right ml-2"></i></button>-->

                                <button class="btn btn-primary border-success align-items-center btn-success ml-auto" type="submit" name='totalCorrect' value=''>
                                    <a style=; href="index.php?action=resultsPage">Submit</a>
                                    <i class="fa fa-angle-right ml-2"></i></button>
                            </div>
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
