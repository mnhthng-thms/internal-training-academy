<?php
session_start();

require_once("utils/connect.php");

$warning_message = "Please re-check your login credentials!";

if (isset($_POST["btnLogin"])) {
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $sql_query =
        "SELECT * FROM system_user WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["user_role_id"] == 1) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['role'] = "Admin";
                header('location: admin.php');
            }
            elseif ($row["user_role_id"] == 2) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['role'] = "Training Staff";
                header('location: staff_homepage.php');
            }
            elseif ($row["user_role_id"] == 3) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['role'] = "Trainer";
                header('location: trainer_homepage.php');
            }
            elseif ($row["user_role_id"] == 4) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['role'] = "Trainee";
                header('location: trainee_homepage.php');
            }
        }
    } else {
        echo "<script> alert('$warning_message')</script>";
    }
}

if (isset($_SESSION['role']) && isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == "Admin") {
        header('location: admin.php');
    }
    if ($_SESSION['role'] == "Training Staff") {
        header('location: staff_homepage.php');
    }
    if ($_SESSION['role'] == "Trainer") {
        header('location: trainer_homepage.php');
    }
    if ($_SESSION['role'] == "Trainee") {
        header('location: trainee_homepage.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <head>
        <meta charset="UTF-8">
        <title>Internal Training Academy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/img/fav.ico"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            body {
                background-image: url("https://cdn.suwalls.com/wallpapers/minimalistic/blurry-far-away-lights-51461-2880x1800.jpg");
                background-color: #cccccc;
            }
        </style>
    </head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="https://github.com/mnhthng-thms/internal-training-academy">
                Internal Training Academy
            </a>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <div class="well">
            <div class="container-fluid" id="login-form">
                <h2 class="text-center text-primary">Log In</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="user" id="username"
                               placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="pass" id="password"
                               placeholder="Password here..." name="password" required>
                    </div>
                    <input type="submit" name="btnLogin" class="btn btn-primary btn-block" value="Login">
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-4"></div>
</div>
</body>
</html>