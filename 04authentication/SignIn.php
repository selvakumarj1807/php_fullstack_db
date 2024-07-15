<?php
session_start();
require('db.php');

if (isset($_POST['submit'])) {
    $enter_email = $_POST['email'];
    $enter_password = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM user");

    while ($row_r = mysqli_fetch_array($res)) {
        $email = $row_r['u_email'];
        $password = $row_r['u_password'];
        $u_name = $row_r['u_name'];


        if ($enter_email == $email && $enter_password == $password) {
            $_SESSION['email'] = $email;
            $_SESSION['user_name'] = $u_name;

            // Add "Remember Me" functionality using cookies
            if (isset($_POST['remember'])) {
                setcookie('email', $email, time() + (86400 * 30), "/"); // 30 days
                setcookie('user_name', $u_name, time() + (86400 * 30), "/"); // 30 days
            }


            header("Location: Profile.php");
            exit;
        }
    }

    // If login fails
    echo "<script>alert('Invalid credentials!');</script>";
    echo '<script type="text/javascript"> window.history.back();</script>'; // Go back to the previous page
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Authentication</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">SignUp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SignIn.php">SignIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="LogOut.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profile.php">Profile</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <br>

    <div class="regform">
        <form role="form" method="POST" enctype="multipart/form-data">

            <label for="email">Email :</label>
            <input type="text" id="email" name="email">
            <br><br>

            <label for="password">Password :</label>
            <input type="password" id="password" name="password">
            <br><br>

            <!-- Remember me -->

            <input type="checkbox" name="remember" id="rememberCheck">
            <label for="rememberCheck">Remember me?</label>

            &nbsp;&nbsp;
            <a href="forgot-password.php">Forgot password?</a>

            <button type="submit" name="submit">SignIn</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>