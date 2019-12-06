<?php
session_start();
include_once "../db.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/main.css">
    <meta name="viewport" content="width=device-width" />
    <title>Patient</title>
  </head>
  <body>
    <ul>
      <li><a class="hover" href="./index.html"> Home </a></li>
      <li><a class="hover" href="./index.html"> Patient Info </a></li>
      <li><a class="hover" href="./index.html" target="_blank"> Logout </a></li>
    </ul>
    <h1>Patients</h1>
    <form  method="post" accept-charset="utf-8">
      <label>Date: <input type="text"></label>
      <!--This will be for the search options for the patient table-->
      <a class="cancel" href="./index.html" target="_self"> Cancel </a>
    </form>
  <table>
    <tr>
      <thead>
        <td>ID</td>
        <td>Name</td>
        <td>Age</td>
        <td>Emergency Contact</td>
        <td>Emergency Contact Name</td>
        <td>Admission Date</td>
      </thead>
    </tr>
<?php
$sql = "SELECT p.userId, u.Fname, u.Lname, u.DoB, p.emergencyContact, p.relationTo, p.admissionDate FROM `patients` p JOIN `users` u ON p.userId = u.userId;";
$result = mysqli_query($conn, $sql);
$name = [];
while($row = mysqli_fetch_assoc($result)){
  echo "<tr>";
  foreach($row as $key => $value){
    if($key == "Fname"){
      array_push($name, $value);
    } else if($key = "Lname"){
      $string = "";
      foreach($name as $index => $Fname){
        $string .= $Fname;
      }
      echo "<td>$string $value</td>";
      \array_splice($name, 0, 1);
    }else{
      echo "<td>$value</td>";
    }
  }
}
echo "</table>";
?>
  </body>
</html>
