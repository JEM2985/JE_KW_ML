<?php

require_once __DIR__ . '/vendor/autoload.php'; // Include Composer autoloader

use Rmunate\Utilities\SpellNumber;

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the input field is set and not empty
    if (isset($_POST['number']) && !empty($_POST['number'])) {
        $number = $_POST['number'];

        try {
            // Encapsulation: Creating an instance of SpellNumber class and using its methods
            $spellNumber = SpellNumber::integer($number); // Encapsulation: Creating an instance of SpellNumber class
            $words = $spellNumber->toLetters(); // Encapsulation: Invoking the public method toLetters()
        } catch (Exception $e) {
            // Handle exceptions
            $error = $e->getMessage();
        }
    } else {
        // Handle empty input
        $error = "Please Enter Number";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeral to Spanish Word</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Numeral to Spanish Word</h1>
        <br>
        <h3 for="number">Enter Number:</h3>
        
        <form method="post">
            
            <input type="number" name="number" id="number" required><br>
            <input type="submit" value="Convert">
            
        </form>
        
        <?php if (isset($words)) : ?>
        <?php if (isset($error)) : ?>
                <p class="result">Spanish Word: <?php echo $words . ' (' . $error . ')'; ?></p>
        <?php else : ?>
                <p class="result">Spanish Word: <?php echo $words; ?></p>
        <?php endif; ?>
            <?php else : ?>

        <?php if (isset($error)) : ?>
            <p class="result">Error: <?php echo $error; ?></p>
        <?php else : ?>
            <p class="result">Spanish Word: </p>
        <?php endif; ?>
        <?php endif; ?>

    </div>
</body>

</html>

