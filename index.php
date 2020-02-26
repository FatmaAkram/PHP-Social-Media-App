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
    <!-- connection  -->
    <?php
    $connect = mysqli_connect("localhost", "root", "", "socialapp");
    if ($connect) {
        $sql = 'SELECT* FROM users u 
            INNER JOIN posts p
            ON u.id = p.userId';
        $result = mysqli_query($connect, $sql);
    }
    ?>
    <!-- end of connection -->
    <!-- Navbar -->
    <?php
    require("navbar.php");
    ?>
    <!-- End of Navbar -->

    <!-- ==============================================
	    Hero
        =============================================== -->

    <section class="hero">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3">

                    <!-- start of while -->
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <!-- end of while -->

                        <div class="cardbox shadow-lg bg-white">

                            <div class="cardbox-heading">
                                <!-- START dropdown-->
                                <div class="dropdown float-right">
                                    <button class="btn btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <em class="fa fa-ellipsis-h"></em>
                                    </button>
                                    <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item text-danger" href="deletePost.php?id=<?php echo $row['id'] ?>">Delete</a>
                                        <a class="dropdown-item" href="editPost.php?id=<?php echo $row['id'] ?>">Edit</a>

                                    </div>
                                </div>
                                <!--/ dropdown -->
                                <div class="media m-0">
                                    <div class="d-flex mr-3">
                                        <a href=""><img class="img-fluid rounded-circle" src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/4.jpg" alt="User"></a>
                                    </div>
                                    <div class="media-body">
                                        <p class="m-0">
                                            <?php
                                            echo $row['username'];
                                            ?></p>
                                        <small><span><i class="icon ion-md-pin"></i> Nairobi, Kenya</span></small>
                                        <small><span><i class="icon ion-md-time"></i> 10 hours ago</span></small>
                                    </div>
                                </div>
                                <!--/ media -->
                            </div>
                            <!--/ cardbox-heading -->

                            <div class="cardbox-item ml-5">
                                <?php
                                echo $row['body'];
                                ?></p>
                            </div>
                            <!--/ cardbox-item -->
                            <div class="cardbox-base">
                                <ul class="float-right">
                                    <li><a><i class="fa fa-comments"></i></a></li>
                                    <li><a><em class="mr-5">12</em></a></li>
                                    <li><a><i class="fa fa-share-alt"></i></a></li>
                                    <li><a><em class="mr-3">03</em></a></li>
                                </ul>
                                <ul>
                                    <li><a><i class="fa fa-thumbs-up"></i></a></li>
                                    <li><a href="#"><img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/3.jpeg" class="img-fluid rounded-circle" alt="User"></a></li>
                                    <li><a href="#"><img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/1.jpg" class="img-fluid rounded-circle" alt="User"></a></li>
                                    <li><a href="#"><img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/5.jpg" class="img-fluid rounded-circle" alt="User"></a></li>
                                    <li><a href="#"><img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/2.jpg" class="img-fluid rounded-circle" alt="User"></a></li>
                                    <li><a><span>242 Likes</span></a></li>
                                </ul>
                            </div>
                            <!--/ cardbox-base -->
                            <div class="cardbox-comments">
                                <span class="comment-avatar float-left">
                                    <a href=""><img class="rounded-circle" src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/6.jpg" alt="..."></a>
                                </span>
                                <div class="search">
                                    <input placeholder="Write a comment" type="text">
                                    <button><i class="fa fa-camera"></i></button>
                                </div>
                                <!--/. Search -->
                            </div>
                            <!--/ cardbox-like -->

                        </div>
                        <!--/ cardbox -->



                        <!-- while bracket -->
                    <?php
                    }
                    ?>
                    <!-- end of  while bracket -->


                </div>
                <!--/ col-lg-6 -->


            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </section>
    <script src="js/JQuery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/js.js"></script>

</body>

</html>