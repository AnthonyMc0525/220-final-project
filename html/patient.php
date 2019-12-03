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
<?php
print_r($_SESSION);
?>
    <form  method="post" accept-charset="utf-8">
      <label>Date: <input type="text"></label>
      <!--This will be for the search options for the patient table-->
      <a class="cancel" href="./index.html" target="_self"> Cancel </a>
    </form>
    <!--This will be where the table should be-->
  </body>
</html>
