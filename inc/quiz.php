<?php

session_start();

include("questions.php");

$total_questions = count($questions);
$display_score = false;
$index = null;
$question = null;

//Check answer submission against answer key and display result via toast message
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["answer"]== $questions[$_POST["index"]]["correctAnswer"]) {
        $toast_message = "Congratulations! Your answer is correct.";
        $_SESSION["total_correct"]++;
    } else {
        $toast_message = "Bummer! That was incorrect.";
    }
}

// Create session variable to hold the indexes of questions already asked.
if (!isset($_SESSION["used_indexes"])) {
    $_SESSION["used_indexes"] = [];
    $_SESSION["total_correct"] = 0;
}

// Display score if all questions have been answered
if (count($_SESSION["used_indexes"]) === $total_questions) {
    $_SESSION["used_indexes"] = [];
    $display_score = true;
} else {
    $display_score = false;
    if (count($_SESSION["used_indexes"]) === 0) {
        $toast_msg = "";
        $_SESSION["total_correct"] = 0;
    }

    // Prevent repeat questions
    do {
        $index = array_rand($questions);
    } while (in_array($index,$_SESSION["used_indexes"]));

    $question = $questions[$index];
    array_push($_SESSION["used_indexes"], $index);

    $answers = [
        $question["correctAnswer"],
        $question["firstIncorrectAnswer"],
        $question["secondIncorrectAnswer"],
    ];
    
    // Randomize order of multiple choice answers
    shuffle($answers);
}

// session_destroy(); // Debug