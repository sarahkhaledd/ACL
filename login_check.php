<?php
session_start();


$email=$_POST["email"];
$password=$_POST["password"];

if (isset($email) && isset($password))
{
		$con=mysqli_connect("localhost","root","12345678","news_db");
		if ($con)
		{
			$q=mysqli_query($con,"SELECT `user_id`, `email`, `password`, `role` FROM `users` WHERE email='$email' and password='$password'");
			if ($q)
			{
				$row=mysqli_fetch_array($q);
				if (isset($row["email"]))
				{	
				$_SESSION["user_id"]=$row["user_id"];
				$_SESSION["email"]=$row["email"];
				$role=$row["role"];
					if(strcmp($role, "admin")==0)
					{
						header("Location: admin.php");
					}
					else
					{
						header("Location: user.php");
					}
				}
				else
				{
					echo "<script>
                    alert('Email or password is not correct');
                    window.location.href='index.php';
                    </script>";
				}
					
				mysqli_close($con);

				
			}
			else
			{
				echo "not selected";
			}
			mysqli_close($con);
		}
		else
		{
			die("not connected".mysqli_errno());
		}
}
else
{
	echo "hacking";
}
?>