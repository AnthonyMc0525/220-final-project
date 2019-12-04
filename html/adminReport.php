
<?php
session_start();
include_once "../db.php";
?>

<div class=table>
<table style="border: 1px solid black;">
  <tr style="border: 1px solid black;">
  <th>Date</th>
  <th>PatientID</th>
  <th>Breakfast</th>
  <th>Lunch</th>
  <th>Dinner</th>
  <th>MorningMed</th>
  <th>NoonMed</th>
  <th>NightMed</th>
  </tr>
</table>

<?php
  $sql = "SELECT * FROM `DailyActivity`";

  $roles = mysqli_query($conn, $sql);
  echo "<table border=1>";

  while($row = mysqli_fetch_assoc($roles)){
    echo "<tr>";
    foreach($row as &$role){
      echo "<td>{$role}</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
?>
</div>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/role.css">
    <meta name="viewport" content="width=device-width" />
    <title> Admin Report </title>
  </head>
  <body>
    <h1> Admin Report </h1>
    <form action="#" method="get" accept-charset="utf-8">
      <label> Date : <input  class="pancake" type="text" value="" name="date" id="admin-date"/></label>
      <input class="submit" type="submit" value="Submit" name="submit" id="submit"/>
      <a class="cancel" href="./index.html" target="_self"> Cancel </a>
    </form>
    <!--create table with the info of all patients info based on the search given by the admin-->
  </body>
</html>
