<?php
include '../settings/config.php';

error_reporting(E_ERROR | E_PARSE);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $departmentID = mysqli_real_escape_string($conn, $_POST['department']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT IGNORE INTO users (Name, Email, Password, UserType) VALUES (?, ?, ?, 'faculty')");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        $userID = $conn->insert_id;
        $stmtFaculty = $conn->prepare("INSERT IGNORE INTO faculty (FacultyID, DepartmentID) VALUES (?, ?)");
        $stmtFaculty->bind_param("ii", $userID, $departmentID);

        if ($stmtFaculty->execute()) {
            echo json_encode(array("status" => true, "message" => "Faculty registered successfully."));
        } else {
            echo json_encode(array("status" => false, "message" => "Error: " . $stmtFaculty->error));
        }
    } else {
        echo json_encode(array("status" => false, "message" => "Error: " . $stmt->error));
    }

    $stmt->close();
    $stmtFaculty->close();
} else {
    echo json_encode(array("status" => false, "message" => "Invalid request."));
}

$conn->close();
