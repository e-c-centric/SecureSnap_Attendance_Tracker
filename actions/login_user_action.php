<?php
include('./../settings/config.php');

global $conn;

function redirects_with($url, $params = [])
{
    $query = http_build_query($params);
    $fullUrl = "{$url}?{$query}";
    header("Location: {$fullUrl}");
    exit;
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

if (is_post_request()) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['UserID'] = $row['UserID'];
        redirects_with('./../views/dashboard.html', ['login' => 'success']);
    } else {
        redirects_with('./../login/login.php', ['login' => 'failed']);
    }
} else {
    redirects_with('./../login/login.php');
}
?>
