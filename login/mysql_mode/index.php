<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(document).ready(function() {
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo "toastr.error('" . $_SESSION['error'] . "');";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "toastr.success('" . $_SESSION['success'] . "');";
                unset($_SESSION['success']);
            }
            ?>
        });
    </script>
</head>

<body>
    <div class="system_name">
        <h2>登入系統</h2>
    </div>

    <div class="login_page">
        <div id="container1">
            <div class="login">
                <h3>登入 Login</h3>
                <form action="login.php" method="POST">
                    <input type="text" id="username" name="username" placeholder="帳號" required>
                    <div class="tab"></div>
                    <input type="password" id="password" name="password" placeholder="密碼" required>
                    <div class="tab"></div>
                    <input type="submit" value="登入" class="submit">
                </form>
                <h5 onclick="show_hide()">註冊帳號</h5>
            </div><!-- login end-->
        </div><!-- container1 end-->
    </div><!-- login_page end-->

    <div class="signup_page">
        <div id="container2">
            <div class="signup">
                <h3>註冊 Sign Up</h3>
                <form action="register.php" method="POST">
                    <input type="text" id="fullname" name="fullname" placeholder="使用者全名" required>
                    <div class="tab"></div>
                    <input type="text" id="username2" name="username" placeholder="帳號" required>
                    <div class="tab"></div>
                    <input type="password" id="password2" name="password" placeholder="密碼" required>
                    <div class="tab"></div>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="確認密碼" required>
                    <div class="tab"></div>
                    <input type="submit" value="註冊" class="submit">
                </form>
                <h5 onclick="show_hide()">登入帳號</h5>
            </div><!-- signup end-->
        </div><!-- container2 end-->
    </div><!-- signup_page end-->

    <div id="bobobo">
        <h4></h4>
    </div>
</body>

</html>