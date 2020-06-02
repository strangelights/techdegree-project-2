<?php

// Generate random questions

function getRandQuestions($total) {
    
    $randQuestions = [];

    // Loop for required number of questions
    for ($i=0; $i<$total; $i++){

        // Get random numbers to add
        $leftAdder = rand(1,99);
        $rightAdder = rand(1,99);

        // Calculate correct answer
        $correctAnswer = $leftAdder + $rightAdder;
        
        // Get unique, incorrect answers within 10 numbers either way of correct answer
        $firstIncorrectAnswer = $correctAnswer + rand(-10,10);
        $secondIncorrectAnswer = $correctAnswer + rand(-10,10);
        
        // Roll again if answers are duplicated 
        while ($firstIncorrectAnswer === $secondIncorrectAnswer) {
            $firstIncorrectAnswer = $correctAnswer + rand(-10,10);
        }
        
        while ($firstIncorrectAnswer === $correctAnswer){
            $firstIncorrectAnswer = $correctAnswer + rand(-10,10);
        }

         while ($secondIncorrectAnswer === $correctAnswer){
            $secondIncorrectAnswer = $correctAnswer + rand(-10,10);
        }

        // Add question and answer to questions array
        $randQuestions[] =
        [
            "leftAdder" => $leftAdder,
            "rightAdder" => $rightAdder,
            "correctAnswer" => $correctAnswer,
            "firstIncorrectAnswer" => $firstIncorrectAnswer,
            "secondIncorrectAnswer" => $secondIncorrectAnswer,
        ];
    }

    return $randQuestions;

}



