<?php 

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

//print_r($_POST['answer_1']);
if (isset($_POST['answer_1'])) {
}else{
    echo "Well noted!";
die();    
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz Result</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.result-container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.correct {
    color: green;
}

.incorrect {
    color: red;
}

</style>
</head>
<body>
  <div class="result-container">
    <h1>Quiz Result</h1>
    <div class="result">
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

    // Calculate user's score
    $total_questions = count($quiz_data);
    $correct_answers = 0;
    $j=1;
    $i=0;
    foreach ($quiz_data as $question) {
        $answer='answer_'.$j;
        $user_answer = $_POST[$answer];
        if ($user_answer == $quiz_data[$i][6]) {
            $correct_answers++;
        }
            $j++;
            $i++;
    }



    // Display user's score
    echo "<p>You answered {$correct_answers} out of {$total_questions} questions correctly.</p>";
    echo "</p><br><br>";
    // Display detailed results
    $j=1;
    $i=0;
    foreach ($quiz_data as $question) {
        $answer='answer_'.$j;
        $user_answer = $_POST[$answer];
        echo "<p>{$quiz_data[$i][0]}</p>"; // Display question
        for ($k = 1; $k <= 5; $k++) {
            echo "<label><name=$user_answer value='{$k}' required> {$k}-{$question[$k]}</label><br>";
        }

        echo "<p>Correct answer is {$quiz_data[$i][6]} and Your answer is: ";
        echo "<span class='correct'>{$_POST[$answer]}</span>";

        echo "</p><br><br>";
            $j++;
            $i++;
    }




// Function to write CSV file
function write_csv_file($file_path, $data) {
    if (($handle = fopen($file_path, "a")) !== FALSE) {
        fputcsv($handle, $data);
        fclose($handle);
    }
}

// Path to CSV file
$file_path = 'quiz_results.csv';

// Get user data
$username = $_SERVER['REMOTE_USER'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$date_time = date('Y-m-d H:i:s');

// Prepare data to write to CSV file
$data_to_write = array($username, $ip_address, $date_time, $total_questions, $correct_answers);
foreach ($_POST as $key => $value) {
    $data_to_write[] = "{$key}: {$value}";
}

// Write data to CSV file
write_csv_file($file_path, $data_to_write);
    ?>
    </div>
  </div>
</body>
</html>
