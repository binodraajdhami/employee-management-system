<?php
// database connection
$connection = new mysqli("localhost", "root", "", "db_employeemanagement");

session_start();
if (!isset($_SESSION['email'])) {
    $login = "../login.php";
    header("location: $login");
} else {
    $loggedin_user = $_SESSION['id'];
    $loggedin_user_query = "SELECT * FROM tbl_users where id= $loggedin_user";
    $loggedin_user_query_result = $connection->query($loggedin_user_query);
    $loggedin_user_query_result_data = $loggedin_user_query_result->fetch_assoc();

    // restore user in session
    $_SESSION['id'] = $loggedin_user_query_result_data['id'];
    $_SESSION['role'] = $loggedin_user_query_result_data['role'];
    $_SESSION['name'] = $loggedin_user_query_result_data['name'];
    $_SESSION['email'] = $loggedin_user_query_result_data['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <header class="admin-header">
            <div class=""></div>
            <div class="loggedin-user">
                <button type="button" class="btn-user">
                    <i class="fa-solid fa-cog"></i>
                    <span><?php echo  $_SESSION['name']; ?></span>
                </button>
                <div class="dropdown-nav">
                    <a href="edit_profile.php">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </a>
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </header>