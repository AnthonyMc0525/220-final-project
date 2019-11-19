<?php
session_start();
include_once "../db.php";
$sql = "SELECT patientId, Fname, Lname FROM user WHERE patientId IS NOT NULL;";
$results = mysqli_query($conn, $sql);
$users = [];
$jsUsers= [];
#echo gettype($users);
$resultCheck = mysqli_num_rows($results);
$i = 0;

if($resultCheck>0)
    while($row = mysqli_fetch_assoc($results))
        {
          array_push($users, $row);
        }
#print_r($users);
foreach ($users as $key => $value) {
  foreach ($value as $Key => $Value){
    array_push($jsUsers, $Value);
  }
}
?>
<!DOCTYPE html>
<html>
  <h1>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/main.css">
    <meta name="viewport" content="width=device-width" />
    <title> Additional Info </title>
  </h1>
  <body>
    <form action="" method="post" accept-charset="utf-8">
      <label> Patient Id : <input type="text" value="" name="id" id="id"/></label>
      <label> Group : <input type="text" value="" name="group" id="group"/></label>
      <label> Admission Date : <input type="text" value="" name="date" id="date"/></label>
      <label> Patient Name :  <input type="text" value="" name="name" id="name"/></label>
      <input type="submit" value="Sumbit" name="submit" id="submit"/>
      <a href="#" target="_self">Cancel</a>
    </form>
    <div class="target">
<?php
foreach($jsUsers as $key => $value){
  echo $value . "  ";
}
?>
    </div>
<?php
echo "
<script>
  let target = document.getElementById('target').innerText.split(' ');
  let input = document.getElementById('id');
  input.addEventListener('blur', (event) =>{
    let Pname = document.getElementById('name');
    if(target.includes(input.value)){
      for(let i=0; i<target.length; i++){
        if(input.value == target[i]){
          Pname.value = target[i+1] + ' ' + target[i+2];
        }
      }
    }
  });
</script>
"
?>
  </body>
</html>
