<?php
include_once "database.php";
session_start();
if(isset($_SESSION['user'])){
	
?>
<html>
<link rel="stylesheet" href="styles.css">
<title>
YOUR PAGE
</title>
<h1>Welcome to your page</h1><?php 
        echo "<center>";
	    echo '<link rel="stylesheet" href="styles.css"><div class="msg3" text-align="center"><label for="msg3">'.$_SESSION['user'].'</label></div>';
	    echo "</center>";
		?>
<body></body>
<div class="footer">
<a href="logout.php" >Logout </a>
</div>
</html>
<?php }
else {
	header("location:index.php?err=1");
}
 ?>

