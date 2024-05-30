<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "EmployeeManagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Employee.name, EmployeeHistory.designation, EmployeeHistory.start_date, EmployeeHistory.end_date 
        FROM EmployeeHistory 
        JOIN Employee ON EmployeeHistory.employee_id = Employee.id 
        ORDER BY EmployeeHistory.start_date";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>Name: " . $row["name"]. " - Designation: " . $row["designation"]. " (From: " . $row["start_date"]. " to: " . ($row["end_date"] ? $row["end_date"] : 'Ongoing') . ")</p>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
