<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
<?php
    $errordata="";
    if (isset($_GET["error"]))
        $errordata = "invalid";
    ?>
    <div class="login-form">
        <form action="controller.php" method="POST">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <span> <?php if ($errordata == "invalid") echo "  * Invalid username or Password"; ?></span>
            <div class="form-group">
                <input class="btnSubmit" type="submit" name="login" value="Log in">
            </div>
        </form>
        <p class="text-center"><a href="register.php">Create an Account</a></p>
    </div>

    <script src="js/JQuery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/js.js"></script>

</body>

</html>