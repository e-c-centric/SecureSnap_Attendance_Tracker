<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>

    <main>
        <form action="../actions/login_user_action.php" method="post", name = "loginForm", id = "loginForm">
            <h1>Login</h1>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required autocomplete="off">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required autocomplete="off">
            </div>
            <section>
                <button type="submit">Login</button>
                <a href="register_faculty_view.php">Register</a>
            </section>
        </form>
    </main>

    <script>
        const form = document.getElementById('loginForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            fetch('../actions/login_user_action.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.login === 'success') {
                        window.location.href = '../views/dashboard.php';
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>
