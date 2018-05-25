<!DOCTYPE html>
<html>
    <title>
        YOUR PROFILE
    </title>
    
    <style>
        body{
            background-image: url("shooping_image3.jpg");
            color: yellow;
        }
    </style>
<body>
<center>
<?php
require_once 'log_in.php';
$dbc= mysqli_connect('localhost', 'root', '', 'online_shopping');
$query=" select * from user_info WHERE user_id='".$_SESSION['user_id']."'";
$data= mysqli_query($dbc, $query);
$row= mysqli_fetch_array($data);
echo'<p>YOUR FIRST NAME</p>'.$row['first_name'];
echo'<p>YOUR LAST NAME</P>'.$row['last_name'];
echo'<p> YOUR USER ID</P>'.$row['user_id'];
echo'<p><a href="front_page.php">MAIN PAGE</a></p>';
print('<img src="'.$row['picture'].'">');




?>
</center>
</body>
</html>