<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		
		if(!empty($name) && !empty($email) && !is_numeric($name) && !empty($message))
		{

			//save to database
			$query = "insert into contact (name,email ,message) values ('$name','$email','$message')";

			mysqli_query($con, $query);
            header("Location: contact.html");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>
