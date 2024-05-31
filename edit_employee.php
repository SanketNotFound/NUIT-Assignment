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
    $name = $_POST["name"];
    $newDesignation = $_POST["newDesignation"];
    $timestamp = $_POST["timestamp"];

    if (!isset($timestamp)) {
        die("Error: timestamp not provided.");
    }

    // Get the employee ID based on the name
    $id_sql = "SELECT id FROM Employee WHERE name='$name'";
    $result = $conn->query($id_sql);

    if ($result->num_rows == 0) {
        die("Error: Employee not found.");
    }

    $row = $result->fetch_assoc();
    $id = $row['id'];

    // Update the Employee table
    $update_sql = "UPDATE Employee SET designation='$newDesignation', timestamp='$timestamp' WHERE id='$id'";
    if ($conn->query($update_sql) === TRUE) {
       
        // Update the EmployeeHistory table
        $history_sql = "UPDATE EmployeeHistory SET end_date='$timestamp' WHERE employee_id='$id' AND end_date IS NULL";
        $conn->query($history_sql);

        // Insert new record into EmployeeHistory
        $new_history_sql = "INSERT INTO EmployeeHistory (employee_id, designation, start_date) VALUES ('$id', '$newDesignation', '$timestamp')";
        $conn->query($new_history_sql);
        echo "Record updated successfully";
    } else {
        echo "Error: " . $update_sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
