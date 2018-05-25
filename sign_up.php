<!DOCTYPE html>
<html>
    <head>
        <title>
            sign up
        </title>
        <style>
            input{
                display:block;
            }
            body{
                 background-image: url("shooping_image3.jpg");
                 color:yellow;
                 
                 
            }
            label{
                color: yellow;
            }
        </style>
            
        
    </head>
    <body>
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
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
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
    <center>
        <form method="POST" action="#" enctype="multipart/form-data">
            <legend> REGISTRATION FORM</legend>
            <label for="first_name">FIRST NAME</label>
            <input type="text" name="first_name" />
            <label for="last_name">LAST NAME</label>
            <input type="text" name="last_name" />
            <label for="user_id" >USER ID</label>
            <input type="text" name="user_id" />
            <label for="password">PASSWORD</label>
            <input type="password" name="password"/>
            <label for="password1">PASSWORD CONFIRMATION</label>
            <input type="password" name="password1"/>
            <label for="image">UPLOAD YOUR PICTURE</label>
            <input type="file" name="image" id="imageUpload" /> 
            <input type="submit" value="SIGN IN" name="submit"/>
        </form>
    </center>
    </body>
</html>
