<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表單</title>
</head>
<body>

    <h1>我的表單</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">姓名：</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">郵箱：</label>
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" value="提交">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];

        // 連接到資料庫（請替換為你的資料庫連接信息）
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydatabase";

        // 創建連接
        $conn = new mysqli($servername, $username, $password, $dbname);

        // 檢查連接
        if ($conn->connect_error) {
            die("連接失敗：" . $conn->connect_error);
        }

        // 插入數據
        $sql = "INSERT INTO mytable (name, email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "數據插入成功";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // 關閉連接
        $conn->close();
    }
    ?>

</body>
</html>
