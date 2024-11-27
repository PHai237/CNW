<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

<!-- CSS -->
<style>
    body {
        font-family: "Georgia", serif;
        margin: 0;
        padding: 0;
        background-color: #282828;
    }

    header {
        background: linear-gradient(135deg, #4b2e16, #2e1a0f);
        border: 5px solid #7a5230;
        padding: 20px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
    }

    .header h1 {
        font-size: 40px;    
        color: #f9d293;
        margin: 0;
        text-transform: uppercase;
        text-align: center;
        letter-spacing: 2px;
        text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.8);
    }

    .header nav {
        display: flex;
        justify-content: center;
        margin-top: 15px;
    }

    .header nav a {
        text-decoration: none;
        color: #f4e3c1;
        font-size: 22px;
        font-weight: bold;
        padding: 10px 20px;
        border: 2px solid transparent;
        background: linear-gradient(135deg, #7a5230, #5b3d21);
        border-radius: 8px;
        margin: 0 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    }

    .header nav a:hover {
        background: linear-gradient(135deg, #b67642, #9c6738);
        color: #fff;
        border: 2px solid #f9d293;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.7);
    }

    .highlight {
        background: linear-gradient(135deg, #d2a87e, #b08460);
        color: #fff;
    }
</style>
</head>

<body>
    <header>
        <div class="header">
            <h1>Administration</h1>

            <nav>
                <?php
                $menuItems = [
                    ["Home", "#"],
                    ["External Page", "#"],
                    ["Categories", "#", "highlight"],
                    ["Authors", "#"],
                    ["Articles", "#"]
                ];

                foreach ($menuItems as $item) {
                    $name = $item[0];
                    $link = $item[1];
                    $class = isset($item[2]) ? $item[2] : '';

                    echo "<a href='$link' class='$class'>$name</a>";
                }
                ?>
            </nav>

        </div>
    </header>
</body>
</html>