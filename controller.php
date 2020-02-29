<?php
$errorArray = [];
$connect = mysqli_connect("localhost", "root", "", "socialapp");
if ($connect) {
    if (isset($_POST['register'])) {
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
    } elseif (isset($_POST['login'])) {
        $username = mysqli_escape_string($connect, $_POST['username']);
        $password = mysqli_escape_string($connect, $_POST['password']);
        $sql = 'select * from users where username="' . $username . '"and password="' . $password . '"';
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location:index.php");
        } else {
            header("Location:login.php?error=invalid");
        }
    } elseif (isset($_POST['updatePost'])) {
        uploadPost($connect,true);
    } elseif (isset($_POST['addPost'])) {
        if (!empty($_POST["postBody"])) {

            uploadPost($connect,false);
            // Display status message
            echo $statusMsg;
            //end of upload image
        } else {
            header("Location:addPost.php?error=body");
        }
    }
}
function uploadPost($connect,$isUpdate)
{
    $postBody = mysqli_escape_string($connect, $_POST['postBody']);
    $id = mysqli_escape_string($connect, $_POST['id']);
    //upload image
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    if (!empty($_FILES["file"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                if(!$isUpdate){
                    $sql = 'insert into posts set body="' . $postBody . '"' . ',userId=' . $id . ',image="' . $fileName . '"';
                }
                else {
                    $postId = mysqli_escape_string($connect, $_POST['postId']);
                    $postBody = mysqli_escape_string($connect, $_POST['postBody']);
                    $sql = 'update posts set body="' . $postBody . '",image="'. $fileName . '"'. 'where id=' . $postId;
                }
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    header("Location:index.php");
                } else {
                    echo " sql add error";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    } else {
        $sql = 'insert into posts set body="' . $postBody . '"' . ',userId=' . $id;
        if(!$isUpdate){
            $sql = 'insert into posts set body="' . $postBody . '"' . ',userId=' . $id . ',image="' . $fileName . '"';
        }
        else {
            $postId = mysqli_escape_string($connect, $_POST['postId']);
            $postBody = mysqli_escape_string($connect, $_POST['postBody']);
            $sql = 'update posts set body="' . $postBody . '"'.'where id=' . $postId;
        }
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("Location:index.php");
        } else {
            echo " sql add error";
        }
    }
}
