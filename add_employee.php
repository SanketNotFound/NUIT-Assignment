<?php
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your MySQL password
$dbname = "EmployeeManagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $designation = $_POST["designation"];
    $timestamp = $_POST["timestamp"];

    $sql = "INSERT INTO Employee (name, designation, timestamp) VALUES ('$name', '$designation', '$timestamp')";
    if ($conn->query($sql) === TRUE) {
        $employee_id = $conn->insert_id;
        $history_sql = "INSERT INTO EmployeeHistory (employee_id, designation, start_date) VALUES ('$employee_id', '$designation', '$timestamp')";
        $conn->query($history_sql);
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
