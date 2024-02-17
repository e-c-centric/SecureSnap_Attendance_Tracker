<?php
include '../settings/config.php';

function getDepartments()
{
    global $conn;
    $sql = "SELECT * FROM Departments";

    // Execute query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $departments = array();

        while ($row = $result->fetch_assoc()) {
            $departments[] = $row;
        }

        return $departments;
    } else {
        return array();
    }
}

$conn->close();
?>