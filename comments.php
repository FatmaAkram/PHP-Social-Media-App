<ul class="img-comment-list">
    <?php
    $getComments = 'SELECT * FROM comments where postId="' . $row["postId"] . '"';
    $comments = mysqli_query($connect, $getComments);
    while ($rowComment = mysqli_fetch_assoc($comments)) {
        echo "<li>";
        $getCommentsInfo = 'SELECT username FROM users where id="' . $rowComment["userId"] . '"';
        $commentInfo = mysqli_query($connect, $getCommentsInfo);
        $commentInfoUsername = mysqli_fetch_assoc($commentInfo)
    ?>
        <?php
        if ($id == $rowComment['userId']) {
        ?>
            <div class="dropdown float-right m-3">
                <button class="btn btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
                    <em class="fa fa-ellipsis-h"></em>
                </button>
                <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item text-danger" href="commentsController.php?deleteCommentId=<?php echo $rowComment['id'] ?>">Delete</a>
                    <a class="dropdown-item" href="editComment.php?id=<?php echo  $rowComment['id'] ?>">Edit</a>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="comment-img">
            <img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/2.jpg">
        </div>
        <div class="comment-text">
            <strong><a href=""><?php echo $commentInfoUsername["username"] ?></a></strong>
            <p><?php echo  $rowComment["comment"] ?></p> <span class="date sub-text">Now</span>
        </div>
        </li>
    <?php
    }
    ?>
</ul>