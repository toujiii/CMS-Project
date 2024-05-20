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
            <!-- <p class="login-err">*Invalid Email or Password</p> -->

            <div class="login-form-con">
                <form action="" method="post">
                    <p class="login-email">Email:</p>
                    <input type="text" name="email" placeholder="example@gmail.com" class="login-input" autocomplete="off">
                    <p class="login-password">Password:</p>
                    <input type="text" name="password" placeholder="password123" class="login-input" autocomplete="off">
                    <button type="submit" class="login-btn">Continue</button>
                </form>


            </div>
            <a class="go-back" href="../webpages/<?php echo $_SESSION['Page'].$blog_id; ?>">Go Back</a>

        </div>
    </div>
</body>

</html>