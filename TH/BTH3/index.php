<?php
$filename = "KTPM3.csv";
$sinhvien = [];

if (($handle = fopen($filename, "r")) !== FALSE) {
    $headers = array_map('trim', fgetcsv($handle, 1000, ","));

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sinhvien[] = array_combine($headers, array_map('trim', $data));
    }

    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            font-size: 50px;
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Danh Sách Sinh Viên</h1>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Lớp</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($sinhvien as $sv) {
                    echo "<tr>";
                    echo "<td>{$sv['Username']}</td>";
                    echo "<td>{$sv['Password']}</td>";
                    echo "<td>{$sv['Lastname']}</td>";
                    echo "<td>{$sv['Firstname']}</td>";
                    echo "<td>{$sv['City']}</td>";
                    echo "<td>{$sv['Email']}</td>";
                    echo "<td>{$sv['Course1']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
