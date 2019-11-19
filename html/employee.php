<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Employee</title>
  </head>
  <body>
    <h1>Employees</h1>
    <!--This is where the table will go for employees that are currently in the table-->
    <form method="post" accept-charset="utf-8">
      <label>EmployeeId: <input type="text" value="" name="employeeId" id="employeeId"/></label>
      <label>New Salary: <input type="text" value="" name="salary" id="salary"/></label>
      <input type="submit" value="Submit" name="salarySubmit" id="salarySubmit"/>
      <a class="cancel" href="./index.html" target="_self"> Cancel </a>
    </form>
  </body>
</html>
