  <?php
	session_start();

	if(isset($_POST['submit'])){

		$UserId 	= $_POST['UserId'];
		$Password 	= $_POST['Password'];
		
        $valid=FALSE;
		if(empty($UserId) || empty($Password)){
			$valid=FALSE;
			echo "null submission";

		}else{
			
			$conn =mysqli_connect('localhost', 'root', '', 'mid_mini_project');
			
			$sql = "select * from userinfo where Id='{$UserId}' and Password='{$Password}'";

			$result = mysqli_query($conn, $sql);
			$user 	= mysqli_fetch_assoc($result);
			echo $_POST['checkRemember'];
			if(!empty($user)){

				if(isset($_POST['checkRemember']))
				{
					setcookie('UserId',$user['UserId'],time()+300000000,'/');
					setcookie('Password',$user['Password'],time()+300000000,'/');

					setcookie('remember',$_POST['checkRemember'], time()+300000000,'/');
					setcookie('status','OK',time()+3000000,'/');
				}	

				else if(!isset($_POST['checkRemember']))
				{

					setcookie('remember',$_POST['checkRemember'], time()-3000000,'/');
					setcookie('UserId',$user['UserId'],time()+3650,'/');
					setcookie('Password',$user['Password'],time()+3650,'/');
					setcookie('status','OK',time()-3655,'/');
					setcookie('ustatus','OK',time()+31000,'/');

				}
              mysqli_close($conn);
				$valid=TRUE;
			}

			if($valid==TRUE)
			{
	         
				header("location:User.html");
			}

			else{
				header("location:login.php");
			}
		}

	}else{
		header("location: Login.php");
	}

?>