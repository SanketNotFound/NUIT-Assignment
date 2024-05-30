<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "EmployeeManagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newDesignation = $_POST["newDesignation"];
    $timestamp = $_POST["timestamp"];

    $update_sql = "UPDATE Employee SET designation='$newDesignation', timestamp='$timestamp' WHERE id='$id'";
    if ($conn->query($update_sql) === TRUE) {
        $history_sql = "UPDATE EmployeeHistory SET end_date='$timestamp' WHERE employee_id='$id' AND end_date IS NULL";
        $conn->query($history_sql);
        $new_history_sql = "INSERT INTO EmployeeHistory (employee_id, designation, start_date) VALUES ('$id', '$newDesignation', '$timestamp')";
        $conn->query($new_history_sql);
        echo "Record updated successfully";
    } else {
        echo "Error: " . $update_sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
