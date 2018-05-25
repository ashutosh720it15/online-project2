<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            NAVIGATION
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
                    <li class="active"><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">CONTACTS</a></li>
                </ul>
                <a  href="<?php
                        {if(isset($_COOKIE['user_id']))
                                echo "log_out.php";
                           else 
                               echo'log_in.html';
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
                <a href="admin.html" class="btn btn-danger navbar-btn ">ADMIN</a>
                 <?php
                        if(isset($_COOKIE['user_id']))
                        {
                            $dbc= mysqli_connect('localhost', 'root', '', 'online_shopping')or die('could not connect to the databases');
 
                        $query=" select * from user_info WHERE user_id='".$_COOKIE['user_id']."'";
                         $data= mysqli_query($dbc, $query);
                         $row= mysqli_fetch_array($data);
                        
                           if($row['first_name']=="admin"&&$row["password"]=="admin")
                           {
                                echo'<a href="add_product.html" class="btn btn-primary navbar-btn">ADD PRODUCT</a>';
                                
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
          <li><a href="book.html">BOOK</a></li>
          <li><a href="mobile.html">MOBILE</a></li>
          <li><a href="cloth.html">CLOTH</a></li>
        </ul>
            </div>
        </nav>
       <?php
   $variable=$_POST['search'];
   $dbc= mysqli_connect('localhost', 'root', '', 'online_shopping')or die('could not connect to the databases');
   $query="SELECT * FROM  cloth WHERE cloth_name='".$variable."'";
   $data= mysqli_query($dbc, $query);
   if(mysqli_num_rows($data)==0)
   {
       
       $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/book.html';
     header('Location:'.$home_url);
     
       
   }
   else
   {
       $row=mysqli_fetch_array($data);
       
       echo'<p>CLOTH NAME</P>'.$row['cloth_name'];
       echo'<br />';
       echo'<p> CLOTH PRICE</p>'.$row['cloth_price'];
       echo'<br />';
       echo'<p> CLOTH DESCRIPTION</p>'.$row['cloth_description'];
       echo'<br />';
       echo"<p><img src=".$row['cloth_picture']."></p>";
        echo'<a href="new_buy1.php">ADD TO CART</a>';
       echo'<p><a href="front_page.php">HOME PAGE</a></p>';
       
       
   }
   
    session_start();
    
       $_SESSION['product']=$row['cloth_name'];
       $_SESSION['product_type']='cloth';
       
    
       
   
    ?>
    </body>
</html>