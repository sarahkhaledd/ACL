<?php
$user_id=$_GET["id"];
session_start(); 
if (isset($_SESSION["user_id"]))
{

if (isset($user_id) && is_numeric($user_id))
{
		$con=mysqli_connect("localhost","root","12345678","news_db");
		if ($con)
		{
            $q=mysqli_query($con,"SELECT `user_id`, `email`, `role`, `UserID`, `addArticle`, `viewArticle`, `DeleteArticle`, `changePermissions` FROM `permissions`, `users` WHERE UserID = $user_id AND user_id = $user_id");
			if ($q)
			{
				$row=mysqli_fetch_array($q);
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
}
else
{
	echo "hacking";
}

?>

<form action="updatePermissionsOk.php" method="post">
<input type="hidden" name="id" id="id" value= <?php echo $row["user_id"]?>>
Email: <?php echo $row["email"]?> <br>
Role: <?php echo $row["role"]?> <br>
Add article permssions: <input type="number" min="0" max="1" name="addArticle" id="addArticle" style="width:320px" value= <?php echo $row["addArticle"]?>><br>
View article permssions: <input type="number" min="0" max="1" name="viewArticle" id="viewArticle" style="width:320px" value= <?php echo $row["viewArticle"]?>><br>
Delete article permssions: <input type="number" min="0" max="1" name="deleteArticle" id="deleteArticle" style="width:320px" value= <?php echo $row["DeleteArticle"]?>><br>
Change permissions: <input type="number" min="0" max="1" name="changePermissions" id="changePermissions" style="width:320px" value= <?php echo $row["changePermissions"]?>><br>
<button  type="submit" name="btn" id="btn">Update</button> <br>

<a href=changePermissions.php> Back </a>

</form>