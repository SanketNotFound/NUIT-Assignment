# Introduction #
This repository contains the codebase for an Employee Management System. Follow the instructions below to set up the system on your local machine.

# Installation Steps #
## Step 1: Install XAMPP ##
Download and install XAMPP from the official website. Follow the installation instructions provided.

## Step 2: Clone Repository ##
Navigate to C:\xampp\htdocs directory and clone this repository using the following command:

`git clone https://github.com/SanketNotFound/NUIT-Assignment.git`

## Step 3: Access phpMyAdmin ##
Open your web browser and navigate to http://localhost/phpmyadmin.

## Step 4: Create Database ##
Click on the "New" button in the left sidebar.
Enter EmployeeManagement as the database name and click "Create".

## Step 5: Run SQL Commands ##
With the EmployeeManagement database selected, click on the "SQL" tab and run the following SQL commands:
```
CREATE TABLE Employee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    designation VARCHAR(100) NOT NULL,
    timestamp DATE NOT NULL
);

CREATE TABLE EmployeeHistory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    designation VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    FOREIGN KEY (employee_id) REFERENCES Employee(id)
);
```
## Working Screenshots ##

### Full-Screen UI
![image](https://github.com/SanketNotFound/NUIT-Assignment/assets/78840310/be174660-ae3e-41bc-ae23-8061eb0c993a)

### Add Employee
![image](https://github.com/SanketNotFound/NUIT-Assignment/assets/78840310/6f1d828d-940b-4183-b693-aa8e59887ef4)

### Employee History

![image](https://github.com/SanketNotFound/NUIT-Assignment/assets/78840310/d38e3319-d093-4767-a557-29af535d45a6)

### Edit Employee
![image](https://github.com/SanketNotFound/NUIT-Assignment/assets/78840310/3874d70f-f588-4b25-b811-8f4e4e69fe0f)

### Employee History Updated
![image](https://github.com/SanketNotFound/NUIT-Assignment/assets/78840310/e03b76af-7945-47df-80b9-3ed77dc400d7)








