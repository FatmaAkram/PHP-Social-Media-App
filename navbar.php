<?php
session_start();
if (isset($_SESSION['id'])) {
    $username = "";
    $id = "";
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
} else {
    header("Location:login.php");
}
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item btn btn-danger ">
                <a style="color:white" class="nav-link" href="addPost.php">Add post <span class="sr-only">(current)</span></a>
            </li>

        </ul>
    </div>

    <span class="float-right card border-danger p-2 mr-2"><?php echo "Welcome " . $username; ?></span>
    <span class="float-right card border-danger p-2">
        <a href="logout.php">Logout</a>
    </span>

</nav>
<!-- End of Navbar -->