<?php
$user_id=$_POST["id"];
$add=$_POST["addArticle"];
$view=$_POST["viewArticle"];
$delete=$_POST["DeleteArticle"];
$change=$_POST["changePermissions"];

if (isset($user_id))
{
		$con=mysqli_connect("localhost","root","12345678","news_db");
		if ($con)
		{
			$q=mysqli_query($con,"UPDATE `permissions` SET `addArticle` = '$add', `viewArticle` = '$view', `DeleteArticle` = '$delete', `changePermissions` = '$change' WHERE `UserID` = '$user_id';");
			if ($q)
			{
				mysqli_close($con);
				header("Location: changePermissions.php");
			}
			else
			{
				echo "not updated";
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
	echo "enter data first";
}


?>