<?php
    include 'DB/DB.php';

    $DB = new DATABASE(DB_DATABASE);
    // Set question number
    $question_num = (int) $_REQUEST['n'];
    // var_dump($question_num);

    //Get Question
    $q = "SELECT * FROM questions WHERE question_num = 'question_num'";
    // Get Result
    $stmt = $DB->query($q) or die($DB->error.__LINE__);
    $question = $stmt->fetch_assoc();
    var_dump($question);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>
    <hr>
    <main>
        <div class="container">
            <h2>Test Your PHP Knowledge</h2>
            <div class="current">Question 1 of 5</div>
            <p class="question">What does PHP Stand for?</p>
            <form action="process.php" method="post">
                <ul class="choices">
                    <li><input type="radio" name="choice" value="1">PHP: Hypertext Preprocessor</li>
                    <li><input type="radio" name="choice" value="1">PHP: Hypertext Preprocessor</li>
                    <li><input type="radio" name="choice" value="1">PHP: Hypertext Preprocessor</li>
                    <li><input type="radio" name="choice" value="1">PHP: Hypertext Preprocessor</li>
                </ul>
                <input type="submit" value="submit">
            </form>
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>
    <hr>
    <footer>
        <div class="container">
            Copyright &copy; 2020, PHP Quizzer
        </div>
    </footer>
</body>
</html>