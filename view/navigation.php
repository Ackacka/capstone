        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: lightgreen;">
            <a class="navbar-brand" href="#">MathWhiz</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=dashboard">MyDashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=quizPage">Quiz</a>
                    </li>
                </ul>
<!--                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=loginPage"><i class="fas fa-sign-out-alt"></i>Logout</a> 
                </li>
                </ul>-->
                <li  class="form-inline my-2 my-lg-0 navbar-nav nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome &nbsp;<?php echo htmlspecialchars($username) ?>!
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?action=loginPage"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                    </div>
                </li>
            </div>
        </nav>
