<?php

include './../settings/config.php';

$sql = "SELECT * FROM departments";
$result = $conn->query($sql);

$majors = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $majors[] = $row;
    }
} else {
    echo "No departments found.";
}