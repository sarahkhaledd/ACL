<?php 
session_start(); 
if (isset($_SESSION["user_id"]))
{

echo "welcome ".$_SESSION["email"]."<br>";
$userID= $_SESSION["user_id"];

echo "<a href='logout.php'> logout <a>";
?>
<table border=2 width="100%">
<?php
$counter=1;
$con=mysqli_connect("localhost","root","12345678","news_db");

if($con)
{
		$q=mysqli_query($con,"SELECT `user_id`, `email`, `role`, `UserID`, `addArticle`, `viewArticle`, `DeleteArticle`, `changePermissions` FROM `permissions`, `users` WHERE UserID = user_id");
        if ($q)
        {
			echo "<tr><th>serial</th><th>email</th><th>role</th><th>add Article</th><th>view Article</th><th>Delete Article</th><th>change Permissions</th><th>Update Permissions</th></tr>";
			while($row=mysqli_fetch_array($q))
			{
				echo "<tr>";
				echo "<td>".$counter++."</td>";
				echo "<td>".$row["email"]."</td>";
				echo "<td>".$row["role"]."</td>";
                echo "<td>".$row["addArticle"]."</td>";
                echo "<td>".$row["viewArticle"]."</td>";
                echo "<td>".$row["DeleteArticle"]."</td>";
                echo "<td>".$row["changePermissions"]."</td>";
				echo "<td><a href='updatePermissions.php?id=".$row["user_id"]."'>Update Permissions</a></td>";
				echo "</tr>";
			}
            echo "<br> <a href=user.php> Back </a>";   
		}
        else
        {
            echo "error".mysqli_errno();
        }
}
else
{
	die("not connected".mysqli_errno());
}
mysqli_close($con);
}
else
{
	header("Location: index.php");
}
?>
</table>