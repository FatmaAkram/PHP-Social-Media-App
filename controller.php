<?php
$errorArray = [];

$connect = mysqli_connect("localhost", "root", "", "socialapp");
if ($connect) {
    // var_dump($_POST);

    if (isset($_POST['register'])) {
        //Query

        if (!isset($_POST['username']) || empty($_POST['username'])) {

            $errorArray[] = "username";
        }

        if (!isset($_POST['email']) || empty($_POST['email']) || !filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {

            $errorArray[] = "email";
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {

            $errorArray[] = "password";
        }

        if (count($errorArray) > 0) {

            header("Location:register.php?error=" . implode(",", $errorArray));
        } else {

            $username = mysqli_escape_string($connect, $_POST['username']);
            $email = mysqli_escape_string($connect, $_POST['email']);
            $password = mysqli_escape_string($connect, $_POST['password']);
            $result = mysqli_query($connect, "insert into users set
                      username='$username',
                      email='$email',
                      password='$password'
                      ");
            if ($result) {

                header("Location:login.php");
            } else {
                echo "Error";
            }
        }
    } else if (isset($_POST['login'])) {
        $username = mysqli_escape_string($connect, $_POST['username']);
        $password = mysqli_escape_string($connect, $_POST['password']);
        $sql = 'select * from users where username="' . $username . '"and password="' . $password . '"';
        $result = mysqli_query($connect, $sql);
        // while ($row = mysqli_fetch_assoc($result)) {
        //     session_start();
        //     $_SESSION['id'] = $row['id'];
        //     $_SESSION['username'] = $row['username'];
        //     header("Location:index.php");
        // }
        $row= mysqli_fetch_assoc($result);
        if ($row) {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location:index.php");
        } else {
            header("Location:login.php?error=invalid");
        }


    } else if (isset($_POST['updatePost'])) {
        $id = mysqli_escape_string($connect, $_POST['postId']);
        $postBody = mysqli_escape_string($connect, $_POST['postBody']);
        $sql = 'update posts set body="' . $postBody . '"' . 'where id=' . $id;
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("Location:index.php");
        } else {
            echo "error";
        }
    } else if (isset($_POST['addPost'])) {
        // $id=mysqli_escape_string($connect,$_POST['postId']);
        $postBody = mysqli_escape_string($connect, $_POST['postBody']);
        $id = mysqli_escape_string($connect, $_POST['id']);
        // echo $postBody;
        $sql = 'insert into posts set body="' . $postBody . '"' . ',userId='.$id;
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("Location:index.php");
        } else {
            echo " add error";
        }
        
    }
    
}
