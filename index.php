<?php
include("inc/quiz.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!-- <link rel="preload" href="css/styles.css" as="style"> -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>
<body>
    <div class="container"style ="display:none;">
        <?php
            if (!empty($toast_message)) {
                echo "<p class='toast-message animate__animated animate__fadeOut animate__delay-2s'>$toast_message</p>";
            }
        ?>
        <div id="quiz-box">
        <?php 
            // Display questions while game is ongoing
            if ($display_score === false):
        ?>
            <p class="breadcrumbs">Question <?php echo count($_SESSION["used_indexes"]); ?> of <?php echo $total_questions; ?></p>
            <p class="quiz">What is <?php echo $question["leftAdder"]; ?> + <?php echo $question["rightAdder"]; ?>?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="index" value="<?php echo $index; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[0]; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[1]; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[2]; ?>" />
            </form>
        <?php 
            endif;
        ?>
        </div>
    <?php 
        // Hide questions and display score after all questions have been answered
        if ($display_score === true):   
    ?>
        <p id="score"class="animate__animated animate__bounceIn animate__delay-1s">You got <?php echo $_SESSION["total_correct"]; ?> of <?php echo $total_questions; ?> correct!</p>
        <a href="/index.php"><button class="btn animate__animated animate__fadeIn animate__delay-2s">Try Again<button</a>
    <?php 
        endif;
    ?>
    </div>
</body>
</html>