<?php
//My db address,username and password.Please change it for your needs.The db must contain a table named guests with id,username,password,email and active rows
$connect=mysqli_connect("127.0.0.1","root","123","user");
if(mysqli_connect_errno($connect)){
	echo "Problem with connection";
	exit();
}
	
?>