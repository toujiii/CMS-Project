<?php
session_start();
if ($_SESSION['Page'] == "blog-profile.php")
    $blog_id = $_SESSION['blog_id'];
else $blog_id = '';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css_admin_login.css">
    <script defer src="../../js/js_admin_login.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <title>Log In</title>
</head>

<body>
    <div class="login-container">
        <div class="left-panel">
            <h1>Kuilt.</h1>
            <p>Explore. Learn. Share.</p>
            <img src="../../images/panel-image.png" alt="panel-image">
        </div>
        <div class="gap"></div>
        <div class="right-panel">
            <img src="../../images/logo.png" alt="logo">
            <p class="login-head">LOG IN</p>
            <p class="login-err" id="error-meg"></p>

            <div class="login-form-con">
                <form action="" method="post" id="form-con">
                    <p class="login-email">Email:</p>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" class="login-input" required>
                    <p class="login-password">Password:</p>
                    <input type="password" id="password" name="password" placeholder="password123" class="login-input"  required>
                </form>
                <button id="submit" class="login-btn">Continue</button>
            </div>
            <a class="go-back" href="../webpages/<?php echo $_SESSION['Page'].$blog_id; ?>">Go Back</a>

        </div>
    </div>
</body>

</html>