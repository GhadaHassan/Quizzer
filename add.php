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
            <form action="add.php" method="post">
                <p>
                    <label for="number">Question Number: </label>
                    <input type="number" name="question_num">
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
                    <label for="choice4">choice #4: </label>
                    <input type="text" name="choice4">
                </p>

                <p>
                    <label for="choice5">choice #5: </label>
                    <input type="text" name="choice5">
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