<?php
session_start();
include_once "../db.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Create Roster</title>
  </head>
  <body>
    <h1>New Roster</h1>
    <form method="post" accept-charset="utf-8">
      <label>Date: <input type="date" value="" name="rosterDate" id="rosterDate"/></label>
      <label>Supervisor: <select name="supervisorNames" id="supervisorNames"> 
<?php
$sql = "SELECT Fname, Lname, employeeId FROM `users` u JOIN `employees` e ON u.userId = e.userId WHERE u.role = 'supervisor';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['employeeId']}'>{$row['Fname']} {$row['Lname']}</option>";
  }
}
?>
      </select></label>
      <label>Doctor: <select name="doctorName" id="doctorName">
<?php
$sql = "SELECT Fname, Lname, employeeId FROM `users` u JOIN `employees` e ON u.userId = e.userId WHERE u.role = 'doctor';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['employeeId']}'>{$row['Fname']} {$row['Lname']}</option>";
  }
}
?>
        
      </select></label>
      <label>Group 1 Caregiver: <select name="group1" id="group1">
<?php
$sql = "SELECT Fname, Lname, employeeId FROM `users` u JOIN `employees` e ON u.userId = e.userId WHERE u.role = 'careGiver';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['employeeId']}'>{$row['Fname']} {$row['Lname']}</option>";
  }
}
?>
      </select>
      </label>
      <label>Group 2 Caregiver: <select name="group2" id="group2">
<?php
$sql = "SELECT Fname, Lname, employeeId FROM `users` u JOIN `employees` e ON u.userId = e.userId WHERE u.role = 'careGiver';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['employeeId']}'>{$row['Fname']} {$row['Lname']}</option>";
  }
}
?>
      </select>
      </label>
      <label>Group 3 Caregiver: <select name="group3" id="group3">
<?php
$sql = "SELECT Fname, Lname, employeeId FROM `users` u JOIN `employees` e ON u.userId = e.userId WHERE u.role = 'careGiver';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['employeeId']}'>{$row['Fname']} {$row['Lname']}</option>";
  }
}
?>
      </select>
      </label>
      <label>Group 4 Caregiver: <select name="group4" id="group4">
<?php
$sql = "SELECT Fname, Lname, employeeId FROM `users` u JOIN `employees` e ON u.userId = e.userId WHERE u.role = 'careGiver';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['employeeId']}'>{$row['Fname']} {$row['Lname']}</option>";
  }
}
?>
      </select>
      </label>
      <input type="submit" value="Submit" name="rosterSubmit" id="rosterSubmit"/>
<?php
if(@$_POST['rosterDate'] && @$_POST['group1'] && @$_POST['group2'] && @$_POST['group3'] && @$_POST['group4']){
  $date = $_POST['rosterDate'];
  $supervisor = $_POST['supervisorNames'];
  $doctor = $_POST['doctorName'];
  $group1 = $_POST['group1'];
  $group2 = $_POST['group2'];
  $group3 = $_POST['group3'];
  $group4 = $_POST['group4'];
  $sql = "INSERT INTO `roster` VALUES (?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_prepare($conn, $sql);
  if($stmt){
    mysqli_stmt_bind_param($stmt, "sssssss", $date, $supervisor, $doctor, $group1, $group2, $group3, $group4);
    $set_date = $date;
    $set_supervisor = $supervisor;
    $set_doctor = $doctor;
    $set_group1 = $group1;
    $set_group2 = $group2;
    $set_group3 = $group3;
    $set_group4 = $group4;
  }

  if(mysqli_stmt_execute($stmt)){
    echo "Changes to roster successfully added";
  }
}
?>
    </form>
    <a href="#" target="_self">Cancel</a>
    <table border=1>
      <thead>
        <tr>
          <td>Date</td>
          <td>Supervisor</td>
          <td>Doctor</td>
          <td>Group 1</td>
          <td>Group 2</td>
          <td>Group 3</td>
          <td>Group 4</td>
        </tr>
      </thead>
<?php
$sql = "SELECT * FROM roster;";
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
?>
  </body>
</html>
