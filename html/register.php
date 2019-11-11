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
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <title> Register </title>
  </head>
  <body class="center">
    <h1> Register </h1>
    <form method="post" id="register-form" accept-charset="utf-8">
      <label class="role"> Select Role :
        <select name="role" id="role">
          <option value="Are"> Are </option>
          <option value="Patient"> Patient </option>
          <option value="Simple"> Simple </option>
          <option value="Placeholders"> Placeholders? </option>
        </select>
      </label>
      <label class="register"> First Name : <input class="pancake" type="text" value="" name="fName" id="fName"/></label>
      <label class="register"> Last Name : <input class="pancake" type="text" value="" name="lName" id="lName"/></label>
      <label class="register"> Email : <input class="pancake" type="text" value="" name="email" id="email"/></label>
      <label class="register"> Phone Number : <input class="pancake" type="text" value="" name="phone" id="phone"/></label>
      <label class="register"> Password : <input class="pancake" type="text" value="" name="password" id="password"/></label>
      <label class="register"> Date of Birth : <input class="pancake" type="text" value="" name="DoB" id="DoB"/></label>
      <label class="visability" id="famLabel"> Family Code : <input class="pancake" type="text" value="" name="family-code" id="family-code"/></label>
      <label class="visability" id="Elabel"> Emergency Contact : <input class="pancake" type="text" value="" name="Econtact" id="Econtact"/></label>
      <label class="visability" id="relationLabel"> Relation to Emergency Contact : <input class="pancake" type="text" value="" name="relationTo" id="relationTo"/></label>
      <button type="submit" value="Submit" name="submit" class="submit" form="login"> Submit </button>
      <a class="cancel" href="./index.html" target="_self"> Cancel </a>
    </form>
<?php
  //need an if statement for if the role is patient. extra data will be added when form is submitted
  if(@$_POST['role'] && @$_POST['fName'] && @$_POST['lName'] && @$_POST['email'] && @$_POST['phone'] && @$_POST['password'] && @$_POST['DoB'] && @$_POST['family-code'] && @$_POST['Econtact'] && @$_POST['relationTo']){
  $sql = "INSERT INTO `user` (`roleId`, `Fname`, `Lname`, `emailId`, `phoneNum`, `password`, `DoB`, `famCode`, `emergencyContact`, `emergencyRelation`)
        VALUES ('{$_POST['role']}', '{$_POST['fName']}', '{$_POST['lName']}', '{$_POST['email']}', '{$_POST['phone']}', '{$_POST['password']}', '{$_POST['DoB']}', '{$_POST['family-code']}', '{$_POST['Econtact']}', '{$_POST['relationTo']}');";
  mysqli_query($conn, $sql);
  }else if(@$_POST['role'] && @$_POST['fName'] && @$_POST['lName'] && @$_POST['email'] && @$_POST['phone'] && @$_POST['password'] && @$_POST['DoB']){
  $sql = "INSERT INTO `user` (`roleId`, `Fname`, `Lname`, `emailId`, `phoneNum`, `password`, `DoB`)
        VALUES ('{$_POST['role']}', '{$_POST['fName']}', '{$_POST['lName']}', '{$_POST['email']}', '{$_POST['phone']}', '{$_POST['password']}', '{$_POST['DoB']}');";
  mysqli_query($conn, $sql);  
  echo "<p>Registration Successful</p>";
  }
?>
    <script src="../script/main.js" charset="utf-8"></script>
  </body>
</html>
