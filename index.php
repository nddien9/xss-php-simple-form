<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}

function test_input($data) {
  $sanitizedComment = filter_var($data, FILTER_SANITIZE_URL);
  $sanitizedComment2 = filter_var($sanitizedComment, FILTER_SANITIZE_ADD_SLASHES);
  $sanitizedComment3 = str_replace("src", "", $sanitizedComment2);
  $sanitizedComment4 = str_replace("href", "", $sanitizedComment3);
  return $sanitizedComment4;
}
?>

<h2>Input your comment!</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Comment: <textarea name="comment" rows="5" cols="60"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Comment:</h2>";
echo $comment;
?>

</body>
</html>