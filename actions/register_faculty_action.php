<?php
include '../settings/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $departmentNo = "SELECT DepartmentID FROM Departments WHERE DepartmentName = '$department'  LIMIT 1";
    $departmentID = $conn->query($departmentNo)->fetch_assoc()['DepartmentID'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO Users (Name, Email, Password, UserType) VALUES (?, ?, ?, 'faculty')");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        $userID = $conn->insert_id;
        $stmtFaculty = $conn->prepare("INSERT INTO Faculty (FacultyID, DepartmentID) VALUES (?, ?)");
        $stmtFaculty->bind_param("ii", $userID, $departmentID);

        if ($stmtFaculty->execute()) {
            header("Location: ./../login/login.php");
        } else {
            echo "Error: " . $stmtFaculty->error;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $stmtFaculty->close();
} else {
    header("Location: register_faculty_view.php");
}

$conn->close();
?>