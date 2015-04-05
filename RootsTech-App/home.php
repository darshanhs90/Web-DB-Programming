<?php
session_start();
if(!isset($_SESSION['user_mail'])) {
  header("location: signIn.php");
  exit();
}
/*else{
  echo $_SESSION['user_mail'];
}*/
?>
<!DOCTYPE html>
<html lang="en" ng-app="RootsTech">
<head>
    <title>Roots Tech App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.theme.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/home.js"></script>
    <script src="js/homeAngular.js"></script>
    
</head>

<body ng-controller="rtCtrl"><!-- update from family members -->
<div class="container">
  <div class="pull-right row">
  <ul class="nav nav-pills col-sm-12" role="tablist">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="search_add.php">List Users</a></li>
        <li><a href="profile.php">My Profile</a></li>
        <li><a href="index.php">Sign Out</a></li> 
      </ul>
  </div>

  <div class="row">
    <div class="page-header col-sm-6">
      <h1 style="font-family: Papyrus, fantasy;">Hi <? echo $_SESSION['user_mail']; ?>,Welcome To Family App</h1>
    </div>
    <div class="col-sm-6"></div>
    </div>
    <div class="row">
        <div class="jumbotron col-sm-12">
        <span>Post to Friends and Family</span>
        <form name="myform2" novalidate ng-mouseover="x=true" ng-mouseleave="x=false">
        <textarea class="form-control" maxlength="500" name="txtarea" ng-model="txt" required placeholder="Enter here to Post"></textarea>
        <div>
        <button class="btn btn-info btn-md" ng-show="myform2.$valid && myform2.$dirty" ng-click="post()">Post</button>
        <button class="btn btn-info btn-md" ng-show="x==true" ng-click="postfamily()" ng-mouseover="txt=y" ng-mouseleave="txt=''">Share Family Tree</button>
        <span class="pull-right" ng-show="myform2.$valid && myform2.$dirty">{{500-txt.length}} Characters Remaining</span>
        </div>
        </form>
        </div>
    </div>
    <div class="row">
        <div class="jumbotron col-sm-12">
        <span>Friends/Family Feed</span>
        <br/>
        <br/>
            <div ng-show="feed.length==0" ng-model="showlength">Zero Updates</div>
    <br/>
    <div ng-show="feed.length>0" ng-repeat="x in feed"><!-- ng-repeat=""-->
        <div style="border:1px solid;border-radius: 10px;">
        <img src="{{x.ppic}}" style="border-radius: 10px;"ng-model="picture" class="imgg"><span style="color: lightblue;word-wrap: break-word;">  {{x.msgs}}</span>
        </div>
        <span class="pull-right">Posted by {{x.name}} on {{x.tmstamp}}</span>
        <hr/>
    </div>
        </div>
    </div>
</div>
</body>
</html>
