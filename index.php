
<html>
<head>
 <link rel="stylesheet" href="styles.css">
 </head>
 <body>
	<h1 >Log In </h1>
	<form method="POST">
	<div class="usr">
	  <label for="username">Username: </label></br>
	  <input type="text" name="username" /> 
	  </div>
	  </p >
	  <div class="paswd">
	  <labelfor="password">Password: </label></br>
	  <input type="password"  name="password"/>
	  </div>
	  </br>
	  <input type="submit" name="submit" value="Log in" />
	  </br>
	  <a href="add_user.php">Create new user</a>
	  </br>
	</form>
	</body>
	</html>

<?php
include 'database.php';
session_start();
if(isset($_GET['err'])){
	if($_GET['err']==1){
		echo "<center>";
	    echo "</br>";
	    echo '<link rel="stylesheet" href="styles.css"><div class="msg2" text-align="center"><label for="msg2">Unauthorized page.</label></div>';
	    echo "</center>";
	}
}
if(isset($_POST['submit'])){
	$username=mysqli_real_escape_string($connect,$_POST['username']);
	$password=mysqli_real_escape_string($connect,$_POST['password']);
	if(empty($username)|| empty($password)){
		echo "<center>";
	    echo "</br>";
	    echo '<link rel="stylesheet" href="styles.css"><div class="msg2" text-align="center"><label for="msg2">Please insert username/password!</label></div>';
	    echo "</center>";
	}
	else{
		$find_data=mysqli_query($connect,"SELECT * FROM guests WHERE username='".$username."' AND password='".$password."' AND active='1'");
	    if(mysqli_num_rows($find_data)>0){
			$_SESSION['user']=$username;
			header("location:logged.php");	
		}
		else{
			echo "<center>";
	        echo "</br>";
	        echo '<link rel="stylesheet" href="styles.css"><div class="msg2" text-align="center"><label for="msg2">Insert correct username/password!</label></div>';
	        echo "</center>";
		}
		mysqli_close($connect);
		}
	}
?>



	
