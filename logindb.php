<?php
	session_start();

	if(isset($_POST['submit'])){

		$uname 		= $_POST['Userame'];
		$password 	= $_POST['password'];


		if(empty($uname) || empty($password)){
			echo "null submission";

		}else{

			$conn =mysqli_connect('localhost', 'root', '', 'user');
			$sql = "select * from userregistration where Username='{$uname}' and Password='{$password}'";

			$result = mysqli_query($conn, $sql);
			$user 	= mysqli_fetch_assoc($result);

			session_regenerate_id();
			$_SESSION['Username']=$user['Username'];
			$_SESSION['UserType']=$user['UserType'];
			session_write_close();


			if(count($user) > 0 ){
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["UserType"]=="Admin")
					{
						$_SESSION['userregistration']=$row['UserName'];
						$_SESSION['status']  = "Ok";
				header('location: Admin.html');
					}
				}
			}
				
			else
			{
			echo "Invalid username/password";
		    }
		}

	}else{
		echo "login.html";//header("location: login.html");
	}