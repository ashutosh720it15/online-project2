<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            FRONT PAGE
        </title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    </head>
    
    <body>
         <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    
                    
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="new_front_page.php">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">CONTACTS</a></li>
                </ul>
                <a  href="<?php
                        {if(isset($_COOKIE['user_id']))
                                echo "log_out.php";
                           else 
                               echo'new_log_in.php';
                        }
                           ?>" class="btn btn-primary navbar-btn"> <?php
                            if(isset($_COOKIE['user_id']))
                            echo'LOG OUT';
                            else
                            {
                            echo'LOG IN';
                            }
                            ?></a>
                <a href="new_sign_in.php" class="btn btn-primary navbar-btn">Sign In</a>
                <a href="new_admin.php" class="btn btn-danger navbar-btn ">ADMIN</a>
                 <?php
                        if(isset($_COOKIE['user_id']))
                        {
                            $dbc= mysqli_connect('localhost', 'root', '', 'online_shopping')or die('could not connect to the databases');
 
                        $query=" select * from user_info WHERE user_id='".$_COOKIE['user_id']."'";
                         $data= mysqli_query($dbc, $query);
                         $row= mysqli_fetch_array($data);
                        
                           if($row['first_name']=="admin"&&$row["password"]=="admin")
                           {
                                echo'<a href="new_add_product.php" class="btn btn-primary navbar-btn">ADD PRODUCT</a>';
                                
                           }
                        }
                        ?>
                 <?php
                         
                         if(isset($_COOKIE['user_id']))
                         {
                             $dbc= mysqli_connect('localhost', 'root', '', 'online_shopping')or die('could not connect to the databases');
 
                        $query=" select * from user_info WHERE user_id='".$_COOKIE['user_id']."'";
                        $data= mysqli_query($dbc, $query);
                        $row= mysqli_fetch_array($data);
                        //echo 'hello';
                           if($row["first_name"]=="admin"&&$row["password"]=="admin")
                           {
                                echo'<a href="delete_product.html" class="btn btn-primary navbar-btn">DELETE PRODUCT</a>';
                           }
                         }
                            
                        
                        ?>
                 <?php
                        if(isset($_COOKIE['user_id']))
                        {
                            echo'<a href="profile.php" class="btn btn-primary navbar-btn">YOUR PROFILE</a>';
                        }
                        ?>
                
                <ul class="nav navbar-nav">
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">SEARCH PRODUCT <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="new_book.php">BOOK</a></li>
            <li><a href="new_mobile.php">MOBILE</a></li>
            <li><a href="new_cloth.php">CLOTH</a></li>
        </ul>
            </div>
        </nav>
        <center>
            <div class="container">
            <div class="jumbotron">
                <h1><b>YOUR PROFILE</b></h1>
<?php
require_once 'log_in.php';
$dbc= mysqli_connect('localhost', 'root', '', 'online_shopping');
$query=" select * from user_info WHERE user_id='".$_SESSION['user_id']."'";
$data= mysqli_query($dbc, $query);
$row= mysqli_fetch_array($data);
echo'<p><b>YOUR FIRST NAME</b></p>'.$row['first_name'];
echo'<p><b>YOUR LAST NAME</b></P>'.$row['last_name'];
echo'<p><b> YOUR USER ID</b></P>'.$row['user_id'];
echo'<p><a href="new_front_page.php">MAIN PAGE</a></p>';
print('<img src="'.$row['picture'].'" class="img-rounded" height="600" width="400"" >');

/*$user_id=$_SESSION['user_id'];
$dbc= mysqli_connect('localhost', 'root', '', 'online_shopping')or die('could not connect to the database');
$query1="SELECT * from product where user_id='$user_id' ";
$data= mysqli_query($dbc, $query1);
$rows= mysqli_fetch_all($data);

foreach($rows as $row){
        echo "<h1>".$row[0]."</h1>";
    
}*/
/*while($row= mysqli_fetch_array($data))
{
}*/






?>
            </div>
            </div>
            
            <div class="container">
                <div class="jumbotron">
                    <h1><b>PRODUCT BOUGHT<b></h1>
                    <?php
                    $user_id=$_SESSION['user_id'];
$dbc= mysqli_connect('localhost', 'root', '', 'online_shopping')or die('could not connect to the database');
$query1="SELECT * from product where user_id='$user_id' ";
$data= mysqli_query($dbc, $query1);
$rows= mysqli_fetch_all($data);

foreach($rows as $row){
        echo "<h1>".$row[0]."</h1>";
    
}
?>
                </div>
            </div>
</center>
    </body>