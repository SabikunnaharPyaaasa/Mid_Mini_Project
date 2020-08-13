<?php
session_start();
if(isset($_POST['submit']))
{
	$Id=$_POST['Id'];
	$Password=$_POST['Password'];
	$Name=$_POST['Name'];
	$Email=$_POST['Email'];
    $UserType=$_POST['UserType'];

	if(empty($Id)||empty($Name)||empty($Email)||empty($Password)||empty($UserType))
	{
	    echo "Field should not be empty";
	}  
    else
	{
		//echo "Registration Successful";
		$conn = mysqli_connect('127.0.0.1', 'root', '','mid_mini_project');
	$query="select Id from userinfo where Id='".$_POST['Id']."'";
	$result = mysqli_query($conn, $query);
	$data=mysqli_fetch_assoc($result);
	if(empty($data))
	{

		if($_POST['Password'] == $_POST['ConfirmPassword']) 
			{
				# code...
				$sql1="INSERT INTO userinfo (Id,Password,Name, Email, UserType) VALUES ('$Id','$Password','$Name', '$Email',$UserType')";

					mysqli_query($conn,$sql1);
					echo "done";
					header("location:login.php");
					 
			}
			else
			{
				echo "password did not match";
			}
			mysqli_close($conn);
	}

	else
	{
		echo "User Name already taken!!!!!";
	}
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<body> 
	</body>
	
	<form action="#" method="POST">
				
		<fieldset>
        <legend><b>REGISTRATION</b></legend>
	
		<br/>
             Id</br>
				
				<input type="text" name="Id" ></br>
				Password	</br>		
					<input name="Password" type="Password">
					<abbr title="hint: sample@example.com"><b>i</b></abbr></br>
					
				ConfirmPassword</br>
		         <input type="password" name="ConfirmPassword" ></br>

		     Name</br>
		         <input type="text" name = "Name" ></br>
			    
				
				Email</br>
				<input type="Email" name="Email" ></br>
		           
					<select name="UserType" >
						<option name="UserType" value="User">User</option>
						<option name="UserType" value="Admin">Admin</option>
					</select>
						User Type [<i>User/Admin</i>]</br>
					</br><input type="submit" name="submit" value="Registration">
		     <a href = "login.php">Login</a>	
									
		</fieldset>
	</form>



	</head>
</html>



