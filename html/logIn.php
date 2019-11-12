<?php
include_once "../db.php";
?>

<?php
session_start()
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../css/main.css">
    <title>Login</title>
  </head>
  <body>
    <h1 class="num1">Log In</h1>
    <form method="post" accept-charset="utf-8" id="login">
      <label class="waffle"> Email : <input class="pancake" type="text" value="" name="email" id="email"/></label>
      <label class="waffle"> Password : <input class="pancake" type="text" value="" name="password" id="password"/></label>
      <button type="submit" value="Submit" name="submit" class="submit" form="login"> Submit </button>
      <a class="cancel" href="./index.html" target="_self"> Cancel </a>
    </form>
<?php
if(@$_GET['email'] && @$_GET['password']){
  $sql = "SELECT * FROM `user` WHERE emailId = '{$_GET['email']}' AND password = '{$_GET['password']}';";
  $result = mysqli_query($conn, $sql);
  if($result == false){
    echo "login failed. either the email or the password were incorrect";
  } else if($result != false){
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['emailId'] = $row['emailId'];
        if($row['patientId']){
          $_SESSION['patientId'] = $row['patientId'];
          echo "<p>{$_SESSION['patientId']}</p> \n";
        }
        echo "<p>{$_SESSION['emailId']}</p>";
      }
    }
  }
}
?>
  </body>
</html>
