<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌺 FLOWERS'S SHOP 🌺</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c2c2c;
        }

        header {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background: linear-gradient(135deg, #5a3c3c, #4e2b2b);
            padding: 20px 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
            border-bottom: 4px solid #3b1a1a;
        }

        .header h1 {
            font-size: 34px;
            color: #f9d293;
            text-align: center;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 1px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            flex: 1;
        }

        .add {
            position: absolute;
            left: 20px;
        }

        .add-btn {
            padding: 12px 22px;
            background: #6b8e23;
            color: white;
            border: 2px solid #4e5b23;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .add-btn:hover {
            background: #4e5b23;
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body>
    <header>
        <div class="add">
            <a href="add.php" class="add-btn">Add New</a>
        </div>
        <h1>FL🌸WER'S SHOP</h1>
    </header>
</body>
</html>
