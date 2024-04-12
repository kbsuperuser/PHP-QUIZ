<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            margin-top: 100px;
        }
        .start-button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .start-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Quiz!</h1>
        <p>Are you ready to test your knowledge?</p>
        <button class="start-button" onclick="startQuiz()">Start Quiz</button>
    </div>

    <script>
        function startQuiz() {
            // Redirect to the quiz page
            window.location.href = "quiz.php"; // Replace "quiz.php" with the URL of your quiz page
        }
    </script>
</body>
</html>
