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
        
         <div class="container">
            <form class="form-horizontal"  method="POST" action="#" enctype="multipart/form-data">
       <div class="form-group">
      <label class="control-label col-sm-2" for="first_name">BOOK NAME</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="book_name" placeholder="first name" name="book_name">
      </div>
        </div>
                 <div class="form-group">
      <label class="control-label col-sm-2" for="first_name">BOOK PRICE</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="book_price" placeholder="first name" name="book_price">
      </div>
        </div>
                 <div class="form-group">
      <label class="control-label col-sm-2" for="first_name">BOOK DESCRIPTION</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="book_description" placeholder="first name" name="book_description">
      </div>
        </div>
               
                 <div class="form-group">
      <label class="control-label col-sm-2" for="image">BOOK PICTURE:</label>
      <div class="col-sm-2">
          
          <link href="https://cdnjs.cloudflare.com/ajax/libs/ratchet/2.0.2/css/ratchet.css" rel="stylesheet"/>
<label for="imageUpload" class="btn btn-primary ">Image</label>
<input type="file" id="imageUpload" accept="image/*" style="display: none" name="image">
      </div>
    </div>
                 <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
            </form>
        </div>
        
         <?php
         if(isset($_POST['submit']))
         {
        $book_name=$_POST['book_name'];
        $book_price=$_POST['book_price'];
        $book_description=$_POST['book_description'];
        echo'hello2';
        
            
      $errors= array();
      if(isset($_FILES['image']))
      {
          echo'hello';
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $hello=explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($hello));
      
      $expensions= array("jpeg","jpg","png");
      
      
      
      
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors); die();
      }
   
   
   $imagename='http://localhost/online_shopping/images/'.$file_name;
   $dbc= mysqli_connect('localhost', 'root', '', 'online_shopping');
   $query="INSERT INTO book values('$book_name','$book_price','$book_description','$imagename')";
   mysqli_query($dbc, $query);
   echo'cloth addition successfull';
      }
         }
        ?>
   
        
    </body>
</html>