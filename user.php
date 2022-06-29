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
	$q=mysqli_query($con,"SELECT * FROM `news_data`");
	if($q)
		$q1=mysqli_query($con,"SELECT `user_id`, `email`, `role`, `UserID`, `addArticle`, `viewArticle`, `DeleteArticle`, `changePermissions` FROM `permissions`, `users` WHERE UserID = $userID AND user_id = $userID");
        if ($q1)
        {
            $row=mysqli_fetch_array($q1);
            if (isset($row["UserID"]))
            {	
                $user_id=$row["UserID"];
				$add=$row["addArticle"];
				$view=$row["viewArticle"];
				$delete=$row["DeleteArticle"];
				$changePermissions=$row["changePermissions"];
            }
		if($view && $delete)
		{
			echo "<tr><th>serial</th><th>title</th><th>des</th><th>view</th><th>delete</th></tr>";
			while($row=mysqli_fetch_array($q))
			{
				echo "<tr>";
				echo "<td>".$counter++."</td>";
				echo "<td>".$row["news_title"]."</td>";
				echo "<td>".$row["news_details"]."</td>";
				echo "<td><a href='view_news.php?new_id=".$row["id"]."'>view</a></td>";
				echo "<td><a href='delete_news.php?new_id=".$row["id"]."'>delete</a></td>";
				echo "</tr>";
			}
		}
		else if($view)
		{
			echo "<tr><th>serial</th><th>title</th><th>des</th><th>view</th></tr>";
			while($row=mysqli_fetch_array($q))
			{
				echo "<tr>";
				echo "<td>".$counter++."</td>";
				echo "<td>".$row["news_title"]."</td>";
				echo "<td>".$row["news_details"]."</td>";
				echo "<td><a href='view_news.php?new_id=".$row["id"]."'>view</a></td>";
				echo "</tr>";
			}
		}
		if($add)
		{
			echo '<div style="float:right"><a href="insert_news.php">add article</a> </div><br>'; 
		}
		if($changePermissions)
		{
			echo '<div style="float:right"><a href="changePermissions.php">Change Permissions</a> </div><br>'; 
		}
	}
	else
	{
		echo "error select".mysqli_errno();
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