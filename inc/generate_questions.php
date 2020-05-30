<?php
// Generate random questions

$rand_questions = [];

// Loop for required number of questions
 for ($i=0; $i<10; $i++){

    // Get random numbers to add
    $leftAdder = rand(1,99);
    $rightAdder = rand(1,99);

    // Calculate correct answer
    $correctAnswer = $leftAdder + $rightAdder;
    
    // Get unique, incorrect answers within 10 numbers either way of correct answer
    $firstIncorrectAnswer = $correctAnswer - rand(1,10);
    $secondIncorrectAnswer = $correctAnswer + rand(1,10);

    // Add question and answer to questions array
    $rand_questions[] =
    [
        "leftAdder" => $leftAdder,
        "rightAdder" => $rightAdder,
        "correctAnswer" => $correctAnswer,
        "firstIncorrectAnswer" => $firstIncorrectAnswer,
        "secondIncorrectAnswer" => $secondIncorrectAnswer,
    ];
 }

// var_dump($rand_questions);

