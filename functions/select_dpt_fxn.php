<?php
include '../settings/config.php';

function getDepartments()
{
    global $conn;
    $sql = "SELECT * FROM Departments";
    $result = $conn->query($sql);


    if ($result) {
        $dropdownOptions = '';
        while ($row = $result->fetch_assoc()) {
            $dropdownOptions .= '<option value="' . $row['DepartmentName'] . '">' . $row['DepartmentName'] . '</option>';
        }
        return $dropdownOptions;
    } else {
        return false;
    }
}

?>