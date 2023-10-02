<?php
session_name("SAME_NAME");
session_start();
?>
<?php
if (!(isset($_COOKIE["username"])) || !(isset($_COOKIE["password"]))) {
    header("Location: login.php");
}
?>
<?php
$imgurl = "imgb/backgroundB.png";
$postht = "<html>\n  <body>\n    <div></div>\n    <style>\n      body{\n\n      }\n    </style>\n  </body>\n</html>\n\n<!-- Write HTML/CSS code in this editor, thanks! -->";
?>
<html lang="zh">

<head>
    <title>MimicStyler</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body spellcheck="false">
    <table border="2">
        <tr>
            <td>
                <form method="POST">
                    <label id="lab1"><strong>源始碼：</strong></label><br><br>
<?php
$google_fonts = "Roboto";

if (isset($_POST['text'])) {
    $postht = $_POST['text'];

    $data = array(
        'html' => $_POST['text'],
        'google_fonts' => $google_fonts,
    );

    $ch = curl_init();

    $certificate_location = 'cacert.pem';

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $certificate_location);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $certificate_location);

    curl_setopt($ch, CURLOPT_URL, "https://hcti.io/v1/image");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_USERPWD, $_COOKIE['username'] . ":" . $_COOKIE['password']);

    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $res = json_decode($result, true);
    if (isset($res['url'])) {
        $urltt = $res['url'] . ".png";
    } else {
        $urltt = ".png";
    }
    if ($urltt != ".png") {
        $image_url = $urltt;
        $datetime = date("Y-m-d-H-i-s", mktime(date('H') + 8, date('i'), date('s'), date('m'), date('d'), date('Y')));
        file_put_contents('img/A' . $datetime . '.png', file_get_contents($image_url));
        $imgurl = 'img/A' . $datetime . '.png';
    }
}
?>
                    <img id="imgp" src="<?php echo $imgurl; ?>">
                    <textarea id="text" name="text" style="border:9px white double;"><?php echo $postht; ?></textarea>
                    <br><br>
                    <button style="border:6px #191919 double;" class="button-73" type="submit" name="submit"
                        value="Submit">確認</button>
                </form>
                <button id="compare-button">比對</button>
                <img id="imgp2" src="data:image/;base64,<?php echo $_SESSION['sessionImg']; ?>">
                <button style="border:6px #191919 double;" class="logout" onclick="delCookie()"
                    name="logout">登出</button>
            </td>
        </tr>
    </table>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>
</body>

</html>