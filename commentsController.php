<?php
session_start();
$errorArray = [];
$connect = mysqli_connect("localhost", "root", "", "socialapp");
$sessionID = $_SESSION['id'];
if (isset($_POST["addcomment"])) {
    $postID = $_POST["postId"];
    $comment = $_POST['comment'];
    if (!isset($_POST['comment']) || empty($_POST['comment'])) {
        $errorArray[] = "comment";
    }
    if (count($errorArray) > 0) {
        header("Location:index.php?error=" . implode(",", $errorArray));
    } else {
        $comment = mysqli_escape_string($connect, $_POST['comment']);
        $result = mysqli_query($connect, "insert into comments set
                  userId='$sessionID',
                  postId='$postID',
                  comment='$comment'
                  ");
        if ($result) {
            header("Location:index.php");
        } else {
            echo "Error";
        }
    }
} else if (isset($_GET["deleteCommentId"])) {
    $res =  mysqli_query($connect, "delete from comments where id='{$_GET['deleteCommentId']}'");
    if ($res) {
        header("Location:index.php");
    }
}elseif (isset($_POST['updateComment'])) {
    $id = mysqli_escape_string($connect, $_POST['commentId']);
    $commentBody = mysqli_escape_string($connect, $_POST['commentBody']);
    $sql = 'update comments set comment="' . $commentBody . '"' . 'where id=' . $id;
    $result = mysqli_query($connect, $sql);
    if ($result) {
        header("Location:index.php");
    } else {
        echo "error";
    }
} 
