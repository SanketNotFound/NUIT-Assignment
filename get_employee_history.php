<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "EmployeeManagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Employee.name, EmployeeHistory.designation, 
        DATE_FORMAT(EmployeeHistory.start_date, '%D %M %Y') AS start_date, 
        CASE 
            WHEN EmployeeHistory.end_date IS NULL THEN 'Ongoing' 
            ELSE DATE_FORMAT(EmployeeHistory.end_date, '%D %M %Y') 
        END AS end_date
        FROM EmployeeHistory 
        JOIN Employee ON EmployeeHistory.employee_id = Employee.id 
        ORDER BY EmployeeHistory.start_date";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Designation: " . $row["designation"]. " (From: " . $row["start_date"]. " to: " . $row["end_date"]. ")<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>