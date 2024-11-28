<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌺 FLOWERS'S SHOP 🌺</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 0;
            padding: 0;
            background-color: #1e1e1e;
        }

        header {
            justify-content: space-between;
            background: linear-gradient(135deg, #4b2e16, #2e1a0f);
            padding: 20px 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            border-bottom: 3px solid #7a5230;
        }

        .header h1 {
            font-size: 36px;
            color: #f9d293;
            text-align: center;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 2px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
        }

        .add {
            display: flex;
        }

        .add-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #6b8e23, #556b2f);
            color: white;
            border: 2px solid #3d5221;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .add-btn:hover {
            background: linear-gradient(135deg, #556b2f, #3d5221);
        }
    </style>
</head>

<body>
    <header>
        <div class="header">
            <div class="add">
                <a href="add.php" class="add-btn">Add New</a>
            </div>
            <h1>FL🌸WER'S SHOP</h1>
        </div>
    </header>
</body>
</html>
