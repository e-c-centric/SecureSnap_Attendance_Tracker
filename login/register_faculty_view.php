<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Faculty</title>
</head>

<body>
    <h2>Register Faculty</h2>
    <form id="registerForm" action="./../actions/register_faculty_action.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <div class="input">
            <div>Department</div>
            <div class="dropdown">
                <select name="department" id="department" required>
                    <option value="" disabled selected>Select Department</option>
                    <?php
                    include '../functions/select_dpt_fxn.php';
                    echo getDepartments();
                    ?>
                </select>
            </div>
        </div>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Register">
    </form>

</body>

</html>