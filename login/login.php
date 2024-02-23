<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/login.css">
    <title>Login</title>
</head>

<body>
    <main>
        <form action="./../actions/login_user_action.php" method="post">
            <h1>Login</h1>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <section>
                <button type="submit">Login</button>
                <a href="register_faculty_view.php">Register</a>
            </section>
        </form>
    </main>
</body>

</html>