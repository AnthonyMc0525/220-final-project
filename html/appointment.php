<?php
session_start();
require_once "../db.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Appointments</title>
  </head>
  <body>
    <h1>Doctor's Appointments</h1>
    <form action="" method="post" accept-charset="utf-8">
      <label>Patient Id: <input type="text" value="" name="patient-id" id="patient-id"/></label>
      <label>Date: <input type="text" value="" name="date" id="date"/></label>
      <label>Doctor: 
        <select name="doctors" id="doctors">
<?php
$sql = "SELECT Fname, Lname, employeeId FROM users u JOIN employees e ON e.userId = u.userId WHERE u.role = 'doctor';";
$results = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($results);

if($resultCheck>0){
  while($row = mysqli_fetch_assoc($results)){
        echo "<option id='{$row['employeeId']}' value='{$row['employeeId']}'>{$row['Fname']} {$row['Lname']}</option>";
  }
}
?>
        </select>
      </label>
      <label>Patient Name: <input type="text" value="" name="patient-name" id="patient-name"/></label>
      <input type="submit" value="Submit" name"submit"/>
    </form>
<?php
if(@$_POST['patient-id'] && $_POST['date'] && $_POST['doctors']){
  $patientId = $_POST['patient-id'];
  $date = $_POST['date'];
  $employeeId = $_POST['doctors'];
  echo " $patientId, $date, $employeeId ";
  $sql = "INSERT INTO `appointments` (`employeeId`, `patientId`)
          VALUES ($employeeId, $patientId);";
  mysqli_query($conn, $sql);

}
?>
  </body>
</html>
