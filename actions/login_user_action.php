<?php
include('./../settings/config.php');

global $conn;
session_start();

$result = array('login' => 'failed', 'message' => '');

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

if (is_post_request()) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $hashedPassword = $row['Password'];
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['email'] = $email;
            $_SESSION['UserID'] = $row['UserID'];
            $response['login'] = 'success';
        } else {
            $response['message'] = 'Invalid username or password';
        }
    }
} else {
    $response['message'] = 'Invalid request';
}

echo json_encode($response);
