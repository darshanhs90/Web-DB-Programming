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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
    <script src="js/signUp.js"></script>
    <script src="js/signUpAngular.js"></script>
</head>

<body>
<div class="container" ng-controller="rtCtrl">
  <div class="pull-right row">
  <ul class="nav nav-pills col-sm-12" role="tablist">
        <li><a href="index.php">Home</a></li>
        <li><a href="signIn.php">Sign In</a></li>
        <li class="active"><a href="#">Sign Up</a></li>   
      </ul>
  </div>
<br/>
<br/>
  <div class="jumbotron row">
    <div class="col-sm-3"></div>
    <form role="form" class="col-sm-6" name="myForm" form-test>
     <div class="row">
       <div class="form-group col-sm-6">
      <label for="name">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter Firstname" required="true" ng-model="userFname">
    </div>
       <div class="form-group col-sm-6">
      <label for="name">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Lastname" required="true" ng-model="userLname">
    </div>
       </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" required="true" ng-model="userMail">
        <span id="mailtxt"></span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" required="true" ng-model="userPwd" title="Minimum Password Length is 8 Characters">
    </div>
    <div class="form-group">
      <label for="pwd">Looking For:</label>
      <select class="form-control" required="true" id="look">
        <option>Friends</option>
        <option>Relatives</option>
        <option>Family Members</option>
      </select>
    </div>
   <div class="form-group">
      <label for="lcn">Enter Location:</label>
      <input type="text" class="form-control" id="lcn" placeholder="Enter Location" required="true" ng-model="userLocation">
    </div>
    <div class="form-group">
      <label for="ppic" title="Use sites like postimage.org">Provide a Profile Picture</label>
      <input type="url" class="form-control" id="ppic" placeholder="Enter Url Link"  title="Use sites like postimage.org" required="true" ng-model="userPic">
    </div>
    <button ng-model="bnsbmt"  type="submit" ng-show="myForm.$invalid" class="btn btn-default" ng-disabled="myForm.$invalid" >Submit</button>
    <button ng-model="bnsbmt" id="bnsubmit" type="submit" class="btn btn-success" ng-show="myForm.$valid" >Submit</button>    
  </form>
<div class="col-sm-3"></div>
</div>
</body>
</html>
