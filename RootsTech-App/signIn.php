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
<html lang="en" ng-app="RootsTech">
<head>
    <title>Roots Tech App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.theme.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/signIn.js"></script>
    <script src="js/signUpAngular.js"></script>
    
</head>

<body ng-controller="rtCtrl">
<div class="container">
  <div class="pull-right row">
  <ul class="nav nav-pills col-sm-12" role="tablist">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="#">Sign In</a></li>
        <li><a href="signUp.php">Sign Up</a></li>   
      </ul>
  </div>

<br/>
<br/>

  <div class="jumbotron row">
    <div class="col-sm-3"></div>
    <form role="form" class="col-sm-6" name="myForm" novalidate>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" required="true" ng-model="userEmail">
    </div>
    <br/>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" required="true" ng-model="userPwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" id="cbPassword" checked="disabled"> Show Password</label>
    </div>
    <button type="submit" class="btn btn-default" ng-show="myForm.$invalid" ng-disabled="myForm.$invalid" id="bnsbmt">Submit</button>
    <button type="submit" class="btn btn-success" ng-show="myForm.$valid" id="sbmt">Submit</button>
    <div class="col-sm-3"></div>
  </form>
    <span id="spntext"></span>
</div>
</body>
</html>
