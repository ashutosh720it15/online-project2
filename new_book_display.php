<!DOCTYPE html>
 <?php @session_start(); ?>
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
        <div class="container">
        <div class="jumbotron">
    <center>
        <?php
        
   $variable=(@$_GET['search'])?$_GET['search']:''; 
  // $_SESSION['search']=(@$_GET['search'])?$_GET['search']:'';
   //$variable=$_SESSION['search'];
   $dbc= mysqli_connect('localhost', 'root', '', 'online_shopping')or die('could not connect to the databases');
   $query="SELECT * FROM  BOOK WHERE book_name='".$variable."'";
   $data= mysqli_query($dbc, $query);
   if(mysqli_num_rows($data)==0)
   {
       
       
     
       
   }
   else
   {
       $row=mysqli_fetch_array($data);
       
       echo'<h1><b>BOOK NAME<b></h1>'.$row['book_name'];
       echo'<br />';
       echo'<h1><b> BOOK PRICE<b></h1>'.$row['book_price'];
       echo'<br />';
       echo'<h1><b> BOOK DESCRIPTION<b></h1>'.$row['book_description'];
       echo'<br />';
       //echo"<h1><img src=".$row['book_picture']." class="img-rounded" height="600" width="400" ></h1>";
       print('<img src="'.$row['book_picture'].'" class="img-rounded" height="600" width="400"" >');
       echo'<br />';
       echo'<br />';

       echo'<a href="new_buy1.php" class="btn btn-primary">ADD TO CART</a>';
       echo'<h1><a href="front_page.php" class="btn btn-primary">HOME PAGE</a></h1>';
       
       
      
       $_SESSION['product']=$row['book_name'];
       $_SESSION['product_type']='book';
       
       
       
   }
   
   
       
    ?>
   <?php
     if(isset($_POST['submit'])&&isset($_SESSION['user_id']))
           {
  
    $user_id=$_SESSION['user_id'];
    $product_name=$_SESSION['product'];
    $product_type=$_SESSION['product_type'];
    $comment=$_POST['comment'];
    $dbc= mysqli_connect('localhost', 'root', '', 'online_shopping');
   // $comment = mysqli_real_escape_string($dbc, trim($_POST['comment']));
    
    $query="INSERT INTO product_comment (`product_name`,`user_id`,`comment`,`product_type`) values('$product_name','$user_id','$comment','$product_type')";
    mysqli_query($dbc, $query);
    
      $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/new_book_display.php';
     header('Location:'.$home_url);
     
           }
   ?> 
    
   
    </center>
             </div>
        </div>
        <div class="container">
            <div class="jumbotron">
            <h1>THE REVIEWS OF USERS</h1>
        <center>
            <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
       <div class="form-group">
           
      <label class="control-label col-sm-1" for="comment">YOUR REVIEW</label>
      <div class="col-sm-3"> 
        <input type="text" class="form-control" id="comment" placeholder="ADD YOUR COMMENT" name="comment">
      </div>
          
    </div>
        <div class="form-group">        
      <div class="col-sm-offset-1 col-sm-3">
        <input type="submit"  name="submit" class="btn btn-primary" value="Submit">
      </div>
    </div>
        </form>
             </center>
             
           <?php
           
 
    
          
//$user_id=$_SESSION['user_id'];
 $product_name=$_SESSION['product'];
$dbc= mysqli_connect('localhost', 'root', '','online_shopping');
$query="SELECT * from product_comment where product_name='$product_name'";
//$query1="SELECT * from product where user_id='$user_id' ";
$data= mysqli_query($dbc, $query);
$rows= mysqli_fetch_all($data);

foreach($rows as $row){
    //echo'<h4>USER ID:</h>';
        echo "<h5><b>".$row[1]."</b></h5>";
      //  echo"<h4>COMMENT:</h4>";
        echo "<h5>".$row[2]."</h5>";
    
}
?>
   
    
       
        </div>
        </div>

    </body>
</html>