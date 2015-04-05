<?php
session_start();
if((session_id() != "") || isset($_SESSION['user_mail'])){
unset($_SESSION['user_mail']);
session_unset();
session_destroy();
}
if(isset($_SESSION['user_mail'])){
    echo $_SESSION['user_mail'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Roots Tech App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.theme.css">
    <link rel="stylesheet" href="css/index.css">
        
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/index.js"></script>
    
    <!--    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>-->
</head>

<body>
<div class="container">
  <div class="pull-right row">
  <ul class="nav nav-pills col-sm-12" role="tablist">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="signIn.php">Sign In</a></li>
        <li><a href="signUp.php">Sign Up</a></li>   
      </ul>
  </div>

  <div class="row">
  <div class="page-header col-sm-6">
    
    <h1 style="font-family: Papyrus, fantasy;"><strong>Welcome To Family App</strong></h1>
  </div>
  <div class="col-sm-6"></div>
  </div>
  <div class="row">
  <div id="myCarousel" class="carousel slide col-sm-12" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img  class="imgg" src="https://jumpcloud.com/blog/wp-content/uploads/2014/12/connect.png" alt="Family" >
            <div class="carousel-caption">
          <h2 style="color:black;font-family: Papyrus, fantasy;">Connect with Friends and Family</h2>
        </div>

      </div>

      <div class="item">
        <img  class="imgg" src="http://www.careergravity.com/wp-content/uploads/2012/05/shutterstock_76947094.jpg" alt="Family" >
            <div class="carousel-caption">
          <h2 style="color:black;font-family: Papyrus, fantasy;">Search for Family members and Relatives</h2>
        </div>

      </div>
    
      <div class="item">
        <img class="imgg" src="http://loriscottstewart.com/author/wp-content/uploads/2014/04/free-family-tree-chart-picture-frames.jpg" alt="Family" >
      <div class="carousel-caption">
          <h2 style="color:black;font-family: Papyrus, fantasy;">Build your Family Tree</h2>
        </div>

      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button"   data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Next</span> 
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button"  data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</body>
</html>
