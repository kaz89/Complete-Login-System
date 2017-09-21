<?php
include 'database.php';
$mail=$_GET['mail'];
$hash=$_GET['hash'];
mysqli_query($connect,"UPDATE guests SET active='1' WHERE email='".$mail."' AND hash='".$hash."' AND active='0'");
mysqli_close($connect);
header('Refresh:5,URL=index.php');
?>
<html>
<head>
 <link rel="stylesheet" href="styles.css">
 </head>
 <body>
<div class="msg">
<label for="msg">User Activated.Please wait 5 seconds to return at the Login page </label></br>
</div>
</body>
</html>