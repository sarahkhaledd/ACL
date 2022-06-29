<?php
$email = $_POST['uemail'];
$pass = $_POST['password'];


if (isset($_POST['btn'])) {

    $servername = "localhost";

    $username = "root";

    $password = "12345678";

    $role = "normal";

    $db = "news_db";

    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {

        die("Connection failed: " . mysqli_connect_error());

    }
    else
    {
                $sql = "INSERT INTO `users`(`email`, `password`,`role`) VALUES ('$email','$pass','$role')";
                $result = mysqli_query($conn, $sql);
                if ($result) 
                {
                    $q=mysqli_query($conn,"SELECT `user_id`, `email`, `password`, `role` FROM `users` WHERE email='$email' and password='$password'");
                    if ($q)
                    {
                        $row=mysqli_fetch_array($q);
                        if (isset($row["email"]))
                        {	
                        $user_id=$row["user_id"];
                        }
                    $sql2 = "INSERT INTO `permissions` (`UserID`, `addArticle`, `viewArticle`, `DeleteArticle`, `changePermissions`) VALUES ('$user_id', '0', '1', '0', '0')";
                    $result2 = mysqli_query($conn, $sql2);
                    header("location: select_all.php");
                } else {
                    echo "<script>
                    alert('This Email Already Exits,Try another email ');
                    window.location.href='register.html';
                    </script>";
                }

                mysqli_close($conn);
            }
        } 
    }
?>