<?php
if(isset($_GET['id'])){
    $connect = mysqli_connect("localhost", "root", "", "socialapp");
    if($connect){
      $res=  mysqli_query($connect,"delete from posts where id='{$_GET['id']}'");
if($res){
    // echo "Done ";
    header("Location:index.php");
}
    }else{
        echo "Error in delete";
    }
}
?>