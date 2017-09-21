<html>
<header>
 <link rel="stylesheet" href="styles.css">
 </header>
 <body>
 <h1 >Username Creation Page </h1>
 <form method="POST">
 <div class="user_creator">
 <label for="user_creator">Insert new user name</label></br>
 <input type="text" name="user_creator"/>
 </div>
 <div class="ins_password">
 <label for="ins_password">Insert new password</label></br>
 <input type="password" name="ins_password"/>
 </div>
 <div class="ins_passwordr">
 <label for="ins_passwordr">Insert new password again</label></br>
 <input type="password" name="ins_passwordr"/>
 </div>
 <div class="ins_mail">
 <label for="ins_mail">Your email for confirmation</label></br>
 <input type="text" name="ins_mail"/>
 </div>
 </br>
 <input type="submit" name="create_user" value="Create new user"/>
 </br>
 <a href="index.php">Back</a>
 </body>
 </html>

<?php
include 'database.php';
function send_email($mail,$hash){
	$to=$mail;
	$subject='Sign up validation email';
	//You must modify your link with your server address and folders
	$message='Click here to validate your account
	http://127.0.0.1/test/Log%20Page/validate_user.php?mail='.$mail.'&hash='.$hash.'';
	$headers='From:smtp@example.com' . "\r\n";
	mail($to,$subject,$message,$headers);
}
if(isset($_POST['create_user'])){
  $new_user=mysqli_real_escape_string($connect,$_POST['user_creator']);
  $new_password=mysqli_real_escape_string($connect,$_POST['ins_password']);
  $repeat_password=mysqli_real_escape_string($connect,$_POST['ins_passwordr']);
  $mail=mysqli_real_escape_string($connect,$_POST['ins_mail']);
    if(empty($new_user)||empty($new_password)||empty($repeat_password)||empty($mail)){
	  echo "<center>";
	  echo "</br>";
	  echo '<link rel="stylesheet" href="styles.css"><div class="msg2" text-align="center"><label for="msg2">You forgot to complete all the fields!</label></div>';
	  echo "</center>";
	  die();
	}
	if(strcmp($new_password,$repeat_password)!=0){
		echo "<center>";
	    echo "</br>";
	    echo '<link rel="stylesheet" href="styles.css"><div class="msg2" text-align="center"><label for="msg2">Please insert the same password!</label></div>';
	    echo "</center>";
	}
else{
	$same_user_db=mysqli_query($connect,"SELECT * FROM guests WHERE username='".$new_user."'");
	if(mysqli_num_rows($same_user_db)>0){
		echo "<center>";
	    echo "</br>";
	    echo '<link rel="stylesheet" href="styles.css"><div class="msg2" text-align="center"><label for="msg2">This username already exists!</label></div>';
	    echo "</center>";
		mysqli_close($connect);
		}
	else{
		$hash=md5(rand(0,1000));
		mysqli_query($connect,"INSERT INTO guests (username,password,email,hash) VALUES ('$new_user','$new_password','$mail','$hash')");
		mysqli_close($connect);
		send_email($mail,$hash);
		echo "<center>";
		echo "</br>";
		echo '<link rel="stylesheet" href="styles.css"><div class="msg2" text-align="center"><label for="msg2">Going to main page in 5 seconds.Please confirm your email!</label></div>';
		echo "</center>";
		header('Refresh:5,URL=index.php');
		}
	}
}

?>
