<?php
$fileName = "quests.txt";
$quests = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Quests and Options
$all_quests = [];
$current_quest = [];

foreach ($quests as $line) {
    if (strpos($line, "Câu") === 0) {
        if (!empty($current_quest)) {
            $all_quests[] = $current_quest;
        }
        $current_quest = [];
    }
    $current_quest[] = $line;
}

$all_quests[] = $current_quest;

// Answers
$answers = [];
foreach ($quests as $line) {
    if (strpos($line, "Đáp án") !== false) {
        $answers[] = trim(substr($line, strpos($line, ":") + 1));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trắc Nghiệm</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            color: #333;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .quest-container {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .quest-container .question {
            font-weight: bold;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .quest-container .check {
            margin-bottom: 10px;
        }

        .check input {
            margin-right: 10px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #2ecc71;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Trắc Nghiệm</h1>

        <form method="post" action="result.php">
            <?php
            $quest_num = 1;
            foreach ($all_quests as $quest) {
                echo "<div class='quest-container'>";
                echo "<div class='question'>{$quest[0]}</div>"; // Hiển thị câu hỏi
                for ($i = 1; $i <= 4; $i++) {
                    $answer = substr($quest[$i], 0, 1); // Lấy đáp án đầu tiên (A, B, C, D)
                    echo "<div class='check'>";
                    echo "<input class='input' type='radio' name='quest{$quest_num}' value='{$answer}' id='quest{$quest_num}{$answer}'>";
                    echo "<label class='label' for='quest{$quest_num}{$answer}'>{$quest[$i]}</label>";
                    echo "</div>";
                }
                echo "</div>";
                $quest_num++;
            }
            ?>
            <button type="submit" class="submit-btn">Nộp Bài</button>
        </form>
    </div>
</body>
</html>
