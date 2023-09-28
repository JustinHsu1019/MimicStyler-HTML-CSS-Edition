<?php
session_name("SAME_NAME");
session_start();
?>
<?php
if (isset($_POST['password'])
    && isset($_POST['username'])) {
    setcookie("username", $_POST['username'], time() + 3600);
    setcookie("password", $_POST['password'], time() + 3600);
    $file = $_FILES['photo']['tmp_name'];
    $fp = fopen($file, 'r');
    $rawDataSS1 = fread($fp, filesize($file));
    fclose($fp);
    $_SESSION['sessionImg'] = $encodedSS1Data = base64_encode($rawDataSS1);
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MimicStyler 登入系統</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="system_name">
        <h2>MimicStyler 登入系統</h2>
    </div>

    <div class="login_page">
        <div id="container1">

            <div class="login">

                <h3>登入 Login</h3>

                <form enctype="multipart/form-data" name="form1" method="POST">
                    <input type="text" id="username" name="username" placeholder="您的 HCTI API User ID" required>
                    <div class="tab"></div>
                    <input type="text" id="password" name="password" placeholder="您的 HCTI API API Key" required>
                    <div class="tab"></div>
                    <br>
                    <label for="photo" class="custom-file-upload">
                        選擇檔案
                    </label>
                    <input type="file" name="photo" id="photo" style="display: none;">
                    <div class="tab"></div>
                    <input type="submit" value="登入" class="submit">
                </form>

            </div>
        </div>
    </div>

    <div id="copyright">
        <h4>By RoseWang</h4> <!-- 此登入頁面建築在 RoseWang 製作的登入頁面模板，原始位置: https://codepen.io/rosewang0303/pen/mXrEwQ-->
    </div>
</body>

</html>
