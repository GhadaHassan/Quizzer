<?php

    // to check all score and collect
    include 'DB/DB.php';

    session_start();

    // check to see if score is set
    if( !isset($_SESSION['score'])) {
        (int)$_SESSION['score'];
    }
    // print_r($_SESSION('score'));

    if($_POST){
        $num = $_POST['question_num'];
        $selected_choice = $_POST['choice'];
        // print_r($_POST);

        $next = $num+1;

        //Get totel Q
        $qQ = "SELECT * FROM questions";
        $resQ = $mysqli->query($qQ) or die($mysqli->error.__LINE__);
        $total = $resQ->num_rows;  // now is 3 rows for number of Q
        // print_r($total);

        // get correct choice
        $q = "SELECT * FROM choices
              WHERE question_num = $num AND is_correct = 1";
        $res = $mysqli->query($q) or die($mysqli->error.__LINE__);
        $row = $res->fetch_assoc();   // this query has coorect choice
        // print_r($row);
        
        $corrct_choice = $row['id'];
        if($corrct_choice == $selected_choice){
            $_SESSION['score']++;
        }
        
        if($num == $total){
            header("LOCATION: final.php");
            exit();
        }
        else{
            header("LOCATION: question.php?n=".$next);
        }
       
    }
?>