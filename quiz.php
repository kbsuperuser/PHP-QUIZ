<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.quiz-container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.question {
    margin-bottom: 20px;
}

.question p {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.choices label {
    display: block;
    margin-bottom: 10px;
}

.choices input[type="radio"] {
    margin-right: 10px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

</style>
</head>
<body>
  <div class="quiz-container">
    <h1>Welcome to the Quiz</h1>
    <form action="submit_quiz.php" method="post">
    <?php
    // Function to read CSV file
    function read_csv_file($file_path) {
        $questions = [];
        if (($handle = fopen($file_path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $questions[] = $data;
            }
            fclose($handle);
        }
        return $questions;
    }

    // Path to CSV file
    $file_path = 'quiz_questions_comma.csv';
    $quiz_data = read_csv_file($file_path);

    // Display questions and choices
    $j=1;
    foreach ($quiz_data as $question) {
        echo "<div class='question'>";
        echo "<p>{$question[0]}</p>"; // Display question
        echo "<div class='choices'>";
        // Display choices
        for ($i = 1; $i <= 5; $i++) {
            echo "<label><input type='radio' name='answer_{$j}' value='{$i}' required> {$question[$i]}</label><br>";
        }
        $j++;
        echo "</div></div>";
    }
    ?>
    <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
