<?php
    include 'DB/DB.php';
  
    session_start();

    

    // Set question number
    $question_num = (int) $_GET['n'];
    // var_dump($question_num);

    $qT = "SELECT * FROM questions";
    $stmtT = $mysqli->query($qT) or die($mysqli->error.__LINE__);
    $totel = $stmtT->num_rows;


    //Get Question
    $q1 = "SELECT * FROM questions WHERE question_num = $question_num";  // not make question_num AUTO_INCREMENT
    // Get Result
    $stmt = $mysqli->query($q1) or die($mysqli->error.__LINE__);
    $question = $stmt->fetch_assoc(); /// return array
    // var_dump($question['question_text']);


    //Get Choices of this Question
    $q2 = "SELECT * FROM choices WHERE question_num = $question_num";
    // Get Result
    $choices = $mysqli->query($q2) or die($mysqli->error.__LINE__);
    // $choices = $stmt->fetch_all();
    // var_dump($choice);
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
    <br><br><br><br><br><br>
    <header>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>
    <hr>
    <main>
        <div class="container">
            <h2>Test Your PHP Knowledge</h2>
            <div class="current">Question <?php echo $question_num?> of <?php echo $totel?></div>
            <p class="question"><?php echo $question['question_text'] ?></p>

            <form action="process.php" method="POST">
                <ul class="choices">
                <?php while($row = $choices->fetch_assoc()){ ?>
                    <li><input type="radio" name="choice" value="<?php echo $row['id'] ?>">
                        <?php echo $row['text'] ?>
                    </li>
                <?php } ?>    
                    
                </ul>
                <input type="submit" value="submit">
                <input type="hidden" name="question_num" value="<?php echo $question_num?>">
            </form>

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