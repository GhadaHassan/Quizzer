<?php

    include 'DB/DB.php';

    $q_question = "SELECT * FROM questions";
    $stmt = $mysqli->query($q_question) or die($mysqli->error.__LINE__);
    $totel = $stmt->num_rows;
    $next = $totel+1;

    if(isset($_POST['submit'])){
        $question_num = $_POST['question_num'];
        $question_text = $_POST['question_text'];

        $q_questions = "INSERT INTO questions(question_num,question_text) VALUES ('$question_num','$question_text')";
        $insert_row = $mysqli->query($q_questions) or die($mysqli->error.__LINE__);
        echo "DONE INSERT QUESTIONS"; die();

        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];

        $correct_choice = $_POST['correct_choice'];
        
        //Validate insert
        if($insert_row){
            foreach($choices as $choice => $value){
                if($value != ''){
                    if($correct_choice == $choice){
                        $is_correct = 1;
                    }
                    else{
                        $is_correct = 0;
                    }

                    $q_choices = "INSERT INTO choices(question_num, is_correct, text) VALUES ('$question_num', '$is_correct', '$value')";

                    $insert_row_choices = $mysqli->query($q_choices) or die($mysqli->error.__LINE__);
                    
                    //validate insert
                    if($insert_row_choices){
                        continue;
                    }
                    else{
                        die('ERROR: (' . $mysqli->errno . ')' . $mysqli->error);
                    }
                }
            }

            $msg = "Question has been added";
        }
       
   }

   
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
            <h2>Add A Question</h2>

            <?php 
                if(isset($msg)){
                echo '<p>' . $msg . '</p>';
                }
            ?>

            <form action="add.php" method="post">
                <p>
                    <label for="number">Question Number: </label>
                    <input type="number"  value="<?php echo $next; ?>" name="question_num">
                </p>

                <p>
                    <label for="text">Question text: </label>
                    <input type="text" name="question_text">
                </p>

                <p>
                    <label for="choice1">choice #1: </label>
                    <input type="text" name="choice1">
                </p>

                <p>
                    <label for="choice2">choice #2: </label>
                    <input type="text" name="choice2">
                </p>

                <p>
                    <label for="choice3">choice #3: </label>
                    <input type="text" name="choice3">
                </p>

                <p>
                    <label for="choice5">Correct Choice Num: </label>
                    <input type="number" name="correct_choice">
                </p>

                <p>
                    <input type="submit" value="submit">
                </p>
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