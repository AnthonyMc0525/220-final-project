<!DOCTYPE html>
<?php
include_once "../db.php"
?>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Employee</title>
  </head>
  <body>
    <h1>Employees</h1>
    <form method="post" accept-charset="utf-8">
      <label>EmployeeId: <input type="text" value="" name="employeeId" id="employeeId"/></label>
      <label>New Salary: <input type="text" value="" name="salary" id="salary"/></label>
      <input type="submit" value="Submit" name="salarySubmit" id="salarySubmit"/>
      <a class="cancel" href="./index.html" target="_self"> Cancel </a>
    </form>
<?php
if(@$_POST['employeeId'] && @$_POST['salary']){
  //do some stuff
}
?>
    <table border=1>
      <tr>
        <td>User Id</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Role</td>
        <td>Salary</td>
      </tr>
<?php
$sql = "SELECT u.userId, u.Fname, u.Lname, u.role, salary FROM `users` u JOIN `employees` e ON u.userId = e.userid;";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  echo "<tr>";
  foreach($row as &$data){
    echo "<td>{$data}</td>";
  }
  echo "</tr>";
}
echo "</table>";
?>

    <form method="get">
      <label>Select By:
        <label>User Id: <input type="text" value="" name="userid" id="userid"/></label>
        <label>First Name: <input type="text" value="" name="Fname" id="Fname"/></label>
        <label>Last Name: <input type="text" value="" name="Lname" id="Lname"/></label>
        <label>Role: <input type="text" value="" name="role" id="role"/></label>
        <label>Salary: <input type="text" value="" name="salary" id="salary"/></label>
      </label>
      <input type="submit" value=""/>
    </form>
<?php
$result = [];
if(@$_GET['userid']){
  $userid = $_GET['userid'];
  echo $userid;
  $sql = "SELECT e.userid, salary, u.Fname, u.Lname FROM `employees` e JOIN `users` u ON e.userid = u.userId WHERE `userid` = $userid";
  $result = mysqli_query($conn, $sql);
  var_dump($result);
  echo "<table border=1>";
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    foreach($row as &$data){
      echo "<td>{$data}</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

} else if(@$_GET['Fname']){
  $Fname = $_GET['Fname'];
  $sql = "SELECT * FROM `employees` WHERE `Fname` = $Fname";
  $result = mysqli_query($conn, $sql);
  echo "<table border=1>";
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    foreach($row as &$data){
      echo "<td>{$data}</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

} else if(@$_GET['Lname']){
  $Lname = $_GET['Lname'];
  $sql = "SELECT * FROM `employees` WHERE `Lname` = $Lname";
  $result = mysqli_query($conn, $sql);
  echo "<table border=1>";
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    foreach($row as &$data){
      echo "<td>{$data}</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

} else if(@$_GET['role']){
  $role = $_GET['role'];
  $sql = "SELECT * FROM `employees` WHERE `role` = $role";
  $result = mysqli_query($conn, $sql);
  echo "<table border=1>";
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    foreach($row as &$data){
      echo "<td>{$data}</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

} else if(@$_GET['salary']){
  $salary = $_GET['salary'];
  $sql = "SELECT * FROM employees WHERE salary = $salary;";
  $result = mysqli_query($conn, $sql);
  echo "<table border=1>";
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    foreach($row as &$data){
      echo "<td>{$data}</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}
?>
  </body>
</html>
