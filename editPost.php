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
    require("navbar.php");
    ?>
    <form action="controller.php" method="POST"  enctype="multipart/form-data" >
        <!-- connection  -->
        <?php 
        $connect = mysqli_connect("localhost", "root", "", "socialapp");
        if ($connect) {
            $id = $_GET['id'];
            $sql = 'SELECT u.username, p.id as postId,p.body FROM users u INNER JOIN posts p ON u.id = p.userId where p.id=' . $id;
            $result = mysqli_query($connect, $sql);
        }
        require("uploadImage.php");
        ?>
        <!-- end of connection -->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="cardbox shadow-lg bg-white">
                            <div class="cardbox-heading">
                                <div class="media m-0">
                                    <div class="d-flex mr-3">
                                        <a href=""><img class="img-fluid rounded-circle" src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/4.jpg" alt="User"></a>
                                    </div>
                                    <div class="media-body">
                                        <p class="m-0">
                                            <?php
                                            echo $username;
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <!--/ media -->
                                </div>
                                <!--/ cardbox-heading -->
                                <div class="cardbox-item">
                                    <textarea class="ml-3" name="postBody" id="" cols="70" rows="10"><?php echo $row['body']; ?></textarea>
                                </div>
                                <!--/ cardbox-item -->
                            </div>
                            <!--/ cardbox -->
                            <input name="postId" hidden type="text" value="<?php echo $row['postId'] ?>">
                            <input class="btn btn-danger" type="submit" name="updatePost" value="Update">

                        <?php
                        }
                        ?>
                    </div>
                    <!--/ col-lg-6 -->
    </form>
    <script src="js/JQuery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/js.js"></script>

</body>

</html>