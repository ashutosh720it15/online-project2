<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SIGN IN</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      
  </style>
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
   $dbc= mysqli_connect('localhost', 'root', '', 'online_shopping')or die('could not connect to the databases');
 
    if(isset($_POST['submit']))
    {
        echo "getting";
        $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
  $last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
   $user_id = mysqli_real_escape_string($dbc, trim($_POST['user_id']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $password2= mysqli_real_escape_string($dbc, trim($_POST['password1']));
    if(($password1==$password2)&&(!empty($first_name)&&!empty($last_name)&&!empty($user_id)))
    {
        
        $query="select * from user_info where user_id='$user_id'";
        $data= mysqli_query($dbc, $query);
        if(mysqli_num_rows($data)==0)
        {
            
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
     /* if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }*/
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors); die();
      }
   }
   
   $imagename='http://localhost/online_shopping/images/'.$file_name;
            $query="INSERT INTO user_info values('$first_name','$last_name','$user_id','$password1','$imagename')";
            mysqli_query($dbc, $query);
             $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/front_page.php';
     header('Location:'.$home_url);
            
        }
        else
        {
            echo'<center><p>PLEASE CHOOSE A DIFFERENT USER ID</p></center>';
        }
 
        
    }
    else
    {
        echo '<center><p>PLEASE FILL THE FORM CORRECTLY</p></center>';
    }
    mysqli_close($dbc);
    }
?>
       
        
        <div class="container">
  <h2>Sign In</h2>
  <form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data">
       <div class="form-group">
      <label class="control-label col-sm-2" for="first_name">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="first_name" placeholder="first name" name="first_name">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2" for="last_name">Last Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2" for="user_id">User Id:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="user_id" placeholder="user id" name="user_id">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="password1">Password:</label>
      <div class="col-sm-10">
          <input type="password" class="form-control" id="password1" placeholder="Password" name="password1">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="image">your picture:</label>
      <div class="col-sm-2">
          
          <link href="https://cdnjs.cloudflare.com/ajax/libs/ratchet/2.0.2/css/ratchet.css" rel="stylesheet"/>
<label for="imageUpload" class="btn btn-primary ">Image</label>
<input type="file" id="imageUpload" accept="image/*" style="display: none" name="image">
      </div>
    </div>
      
       
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

    </body>
    
    
</html>