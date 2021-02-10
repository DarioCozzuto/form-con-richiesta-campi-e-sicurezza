
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$idErr = $emailErr = $id = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["id"])) {
    $idErr = "L'ID è richiesto";
  } else {
    $id = "ID = " . test_input($_POST["id"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "L'email è richiesta";
  } else {
    $email = "email = " . test_input($_POST["email"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Esempio di form con campi obbligatori e misure di sicurezza</h2>
<p><span class="error">* campi richiesti</span></p>
<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ID: <input type="text" name="id">
  <span class="error">* <?php echo $idErr;?></span>
  <br><br>
  Email: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Gli input:</h2>";
echo $id;
echo "<br>";
echo $email;
?>

</body>
</html>
