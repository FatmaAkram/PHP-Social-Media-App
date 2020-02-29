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
    $errordata = [];
    if (isset($_GET["error"]))
        $errordata = explode(',', $_GET["error"]);
    ?>
    <form action="controller.php" method="POST">
        <div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Registeration</p>
                </div>

                <div class="form-content">
                    <div class="row justify-content-center">
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <span> <?php if (in_array("username", $errordata)) echo "  **Username is empty"; ?></span>
                                <input required type="text" name="username" class="form-control" placeholder="Username *" />
                            </div>
                            <div class="form-group">
                                <span> <?php if (in_array("email", $errordata)) echo "  * Email not valid"; ?></span>
                                <input required type="text" name="email" class="form-control" placeholder="Email *" />
                            </div>
                            <div class="form-group">
                                <span> <?php if (in_array("password", $errordata)) echo "  **Password is empty"; ?></span>
                                <input required type="password" name="password" class="form-control" placeholder="Your Password *" />
                            </div>
                            <input class="btnSubmit" type="submit" name="register" value="register"> <br>
                            <p class="text-center"><a href="login.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="js/JQuery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/js.js"></script>

</body>

</html>