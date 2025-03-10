<!DOCTYPE HTML>  
<html>
<head>

 <title>PHP Form Validation Example</title>
 
<link rel = "icon" href = "1.png" type = "image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">


</head>
<body>  

<?php
/* Engineer.Abdulaziz.is@gmail.com */
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

}
/* Engineer.Abdulaziz.is@gmail.com */
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="EngineerAbdulazizis">
  <div class="column1">
  <h1></h1>
  </div>
  <div class="column">
  <img src="1.png">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <label for="fname">Name:</label> 
  <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
  <label for="fname">E-mail:</label>
  <input type="text" name="email" value="<?php echo $email;?>">
  <br><br>
  <label for="Website">Website:</label>
  <input type="text" name="website" placeholder="https://example.com" pattern="https://.*" value="<?php echo $website;?>">
  <br><br>
  <label for="Comment">Comment:</label>
  <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br><br>
  <button type="submit" class="registerbtn" value="Submit">Submit</button> 
</form>
  </div>
  <div class="column1">
    <h1></h1>
  </div>
</div>


<div class="EngineerAbdulazizis">
  <div class="column1">
  <h1></h1>
  </div>
  <div class="column">
  <img src="2.png">
<?php
echo "<br>";
echo "<br>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
?>

  </div>
  <div class="column1">
    <h1></h1>
  </div>
</div>

</body>
</html>