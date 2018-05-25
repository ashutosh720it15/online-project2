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
            <div class="jumbotron">
                <center>
                <h1>WELCOME TO ONLINE SHOPPING SYSTEM</h1>
                <h3>THIS IS A PLACE FOR EVERY THING </h3>
                <h3>BUY BOOKS CLOTHS AND MOBILE IN CHEAP PRICE</h3>
                </center>
            </div>
        </div>
        <div class="container">
            <center>
                <h2>IMAGES</h2>
            </center>
            <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="cloth.jpg" target="_blank">
              <img src="cloth.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <p>Clothing (also known as clothes and attire) is a collective term for garments, items worn on the body. Clothing can be made of textiles, animal skin, or other thin sheets of materials put together. The wearing of clothing is mostly restricted to human beings and is a feature of nearly all human societies. The amount and type of clothing worn depend on body type, social, and geographic considerations. Some clothing can be gender-specific.</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="mobile.jpg" target="_blank">
              <img src="mobile.jpg" alt="Nature" style="width:100% " style="height: 50%">
          <div class="caption">
            <p>A mobile phone, known as a cell phone in North America, is a portable telephone that can make and receive calls over a radio frequency link while the user is moving within a telephone service area. The radio frequency link establishes a connection to the switching systems of a mobile phone operator, which provides access to the public switched telephone network (PSTN). Modern mobile telephone services use a cellular network architecture, and, therefore, mobile telephones are called cellular telephones or cell phones, in North America</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="book.jpg" target="_blank">
              <img src="book.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p>A book is a series of pages assembled for easy portability and reading, as well as the composition contained in it. The book's most common modern form is that of a codex volume consisting of rectangular paper pages bound on one side, with a heavier cover and spine, so that it can fan open for reading. Books have taken other forms, such as scrolls, leaves on a string, or strips tied together; and the pages have been of parchment, vellum, papyrus, bamboo slips, palm leaves, silk, wood, and other materials.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
        </div>
        
        <div class="container">
            <center>
  <h2>IMAGES</h2>  
            </center>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
          <img src="cloth.jpg" alt="Los Angeles" class="img-rounded" style="width:100%;">
      </div>

      <div class="item">
          <img src="book.jpg" alt="Chicago" class="img-rounded" style="width:100%;">
      </div>
    
      <div class="item">
          <img src="mobile.jpg" alt="New york" class="img-rounded" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
        
        
        

    </body>
</html>
