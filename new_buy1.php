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
                            echo'<a href="new_profile.php" class="btn btn-primary navbar-btn">YOUR PROFILE</a>';
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
        
        <div class="container">
  <h2>CREDIT CARD DETAIL</h2>
  <form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data">
       <div class="form-group">
      <label class="control-label col-sm-2" for="first_name">ENTER YOUR NAME</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="first_name" placeholder="ENTER YOUR NAME" name="first_name">
      </div>
    </div>
      
       <div class="form-group">
      <label class="control-label col-sm-2" for="first_name">ENTER CREDIT CARD NUMBER</label>
      <div class="col-sm-10">
          <input type="number" class="form-control" id="first_name" placeholder="ENTER CREDIT CARD NUMBER" name="first_name">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2" for="last_name">ENTER CVV OF CREDIT CARD</label>
      <div class="col-sm-10">
          <input type="password" class="form-control" id="last_name" placeholder="CVV" name="last_name">
      </div>
    </div>
      
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-primary">PROCEED TO BUY</button>
      </div>
    </div>
       
   
  </form>
  <?php
  session_start();
  
  if(!isset($_SESSION['user_id']))
  {
      echo'<center><h4>PLEASE LOG IN FIRST<h4></center>';
      echo'<center><a href="new_log_in.php" class="btn btn-primary"><h4>LOGIN</h4></a></center>';
  }
  if(isset($_POST['submit'])&&isset($_SESSION['user_id']))
  {
      
      $product=$_SESSION['product'];
      $product_type=$_SESSION['product_type'];
      $user_id=$_SESSION['user_id'];
      $dbc= mysqli_connect('localhost', 'root','', 'online_shopping');
      $query="INSERT INTO PRODUCT (`product_name`,`user_id`,`product_type`)VALUES('$product','$user_id','$product_type')";
      mysqli_query($dbc, $query);
      echo'<center><h4><b>PRODUCT SUBMITTED<b></h4></center>';
  }
          
  ?>
        </div>
    </body>