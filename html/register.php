<?php
  session_start()
?>

<?php
  include_once "../db.php"
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../css/main.css">
    <title> Register </title>
  </head>
  <body class="center">
    <h1> Register </h1>
    <form method="post" id="register-form" accept-charset="utf-8">
      <label class="role"> Select Role :
        <select name="role" id="role">
<?php
$sql = "SELECT role, accessLvl FROM roles;";
$results = mysqli_query($conn, $sql); 
$resultCheck = mysqli_num_rows($results);
if($resultCheck>0)
    while($row = mysqli_fetch_assoc($results))
        {
          echo "<option id='{$row['role']}' value='{$row['role']}'>{$row['role']}</option>";
        }
?>
        </select>
      </label>
      <label class="register"> First Name : <input class="pancake" type="text" value="" name="fName" id="fName"/></label>
      <label class="register"> Last Name : <input class="pancake" type="text" value="" name="lName" id="lName"/></label>
      <label class="register"> Email : <input class="pancake" type="text" value="" name="email" id="email"/></label>
      <label class="register"> Phone Number : <input class="pancake" type="text" value="" name="phone" id="phone"/></label>
      <label class="register"> Password : <input class="pancake" type="password" value="" name="password" id="password"/></label>
      <label class="register"> Date of Birth : <input class="pancake" type="text" value="" name="DoB" id="DoB"/></label>
      <label class="visability" id="Elabel"> Emergency Contact : <input class="pancake, visability" type="text" value="" name="Econtact" id="Econtact"/></label>
      <label class="visability" id="relationLabel"> Relation to Emergency Contact : <input class="pancake, visability" type="text" value="" name="relationTo" id="relationTo"/></label>
      <input type="submit" value="Sumbit" name="submit" id="submit"/>
      <a class="cancel" href="./index.html" target="_self"> Cancel </a>
    </form>
<?php
$role = "";
$fName = "";
$lName = "";
$email = "";
$phone = "";
$password = "";
$DoB = "";
if(@$_POST['role'] != 'patient' && (@$_POST['role'] && @$_POST['fName'] && @$_POST['lName'] && @$_POST['email'] && @$_POST['phone'] && @$_POST['password'] && @$_POST['DoB'])){
  $role = $_POST['role'];
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $DoB = $_POST['DoB'];
  $sql = "INSERT INTO `users`(userId, role, Fname, Lname, email, phoneNumber, password, DoB) VALUES (NULL, '$role', '$fName', '$lName', '$email', '$phone', '$password', '$DoB')";
  mysqli_query($conn, $sql);
} else if (@$_POST['role'] == 'patient' && (@$_POST['role'] && @$_POST['fName'] && @$_POST['lName'] && @$_POST['email'] && @$_POST['phone'] && @$_POST['password'] && @$_POST['DoB'] && @$_POST['Econtact'] && @$_POST['relationTo'])){
  $role = $_POST['role'];
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $DoB = $_POST['DoB'];
  $Econtact = $_POST['Econtact'];
  $relationTo = $_POST['relationTo'];
  $sql = "INSERT INTO `users`(userId, role, Fname, Lname, email, phoneNumber, password, DoB) VALUES (NULL, '$role', '$fName', '$lName', '$email', '$phone', '$password', '$DoB')";
  mysqli_query($conn, $sql);
  $sql = "SELECT userId FROM `users` WHERE `Fname` = '$fName';"; 
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  
  if($resultCheck>0)
    while($row = mysqli_fetch_assoc($result))
        {
          foreach($row as $key => $value){
            $sql = "INSERT INTO `patients`(`userId`, `patientId`, `familyCode`, `emergencyContact`, `relationTo`, `patientGroup`, `admissionDate`, `due`) VALUES ('$value', 'NULL', '$value', '$Econtact', '$relationTo', 'NULL', 'NULL', 'NULL');";
            mysqli_query($conn, $sql);
          }
        }
}
?>
    <script src="../script/main.js" charset="utf-8"></script>
  </body>
</html>
