<?php
$fileName = "quests.txt";
$quests = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$all_quests = [];
$current_quest = [];
$answers = [];

// Xử lý câu hỏi
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

// Xử lý đáp án
foreach ($quests as $line) {
    if (strpos($line, "Đáp án:") !== false) {
        $answers[] = trim(substr($line, strpos($line, ":") + 1));
    }
}

// Xử lý điểm
$score = 0;
foreach ($_POST as $quest => $playerAnswer) {
    $quest_num = (int)filter_var($quest, FILTER_SANITIZE_NUMBER_INT);
    if (isset($answers[$quest_num - 1]) && $answers[$quest_num - 1] === $playerAnswer) {
        $score++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Trắc Nghiệm</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .noti {
            background-color: #27ae60;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .submit-btn {
            display: block;
            width: 96%;
            padding: 15px;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kết Quả Trắc Nghiệm</h1>
        <div class="noti">
            Bạn trả lời đúng <strong><?php echo $score; ?></strong> / <?php echo count($answers); ?> câu!
        </div>
        <a href="index.php" class="submit-btn">Làm Lại</a>
    </div>
</body>
</html>
