<?php

	$conn = mysqli_connect('127.0.0.1', 'root', '', 'mid_mini_project');
	$result = mysqli_query($conn, 'select * from userinfo where UserType="Admin"');


?>

<!DOCTYPE html>
<html>
<head>
	<title>Userlist</title>
</head>
<body>
	<h1>Userlist</h1>

	<table border=1>
		<tr>
			<td>ID</td>
			<td>PASSWORD</td>
			<td>NAME</td>
			<td>EMAIL</td>
			<td>TYPE</td>
		</tr>

		<?php  while($data = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $data['Id'] ?></td>
			
			<td><?php echo $data['Password'] ?></td>
			<td><?php echo $data['Name'] ?></td>
			<td><?php echo $data['email'] ?></td>
			<td><?php echo $data['UserType'] ?></td>
		</tr>

		<?php } ?>

	</table>
</body>
</html> 