$(document).ready(function() {
    $("#addEmployeeForm").submit(function(event) {
        event.preventDefault();
        $.post("add_employee.php", $(this).serialize(), function(data) {
            alert(data);
            $("#addEmployeeForm")[0].reset();
            loadEmployeeHistory();
        });
    });

    $("#editEmployeeForm").submit(function(event) {
        event.preventDefault();
        $.post("edit_employee.php", $(this).serialize(), function(data) {
            alert(data);
            $("#editEmployeeForm")[0].reset();
            loadEmployeeHistory();
        });
    });

    function loadEmployeeHistory() {
        $.get("get_employee_history.php", function(data) {
            $("#employeeHistory").html(data);
        });
    }

    loadEmployeeHistory();
});
