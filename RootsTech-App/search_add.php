<?php
session_start();
if(!isset($_SESSION['user_mail'])) {
  header("location: index.php");
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
    <link rel="stylesheet" href="css/profile.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js""></script>
    <script src="js/search_add.js"></script>
    <script src="js/search_addAngular.js"></script>
</head>

<body ng-controller="rtCtrl">
<div class="container">
  <div class="pull-right row">
  <ul class="nav nav-pills col-sm-12" role="tablist">
        <li><a href="home.php">Home</a></li>
        <li class="active"><a href="search_add.php">List Users</a></li>
        <li><a href="profile.php">My Profile</a></li>
        <li><a href="index.php">Sign Out</a></li>
      </ul>
  </div>

  <div class="row">
  <div class="page-header col-sm-6">
    <h1>Welcome To Family App</h1>
  </div>
  <div class="col-sm-6"></div>
  </div>
  <div class="row">
    <div class="jumbotron col-sm-12" >
        <span style="font-family: Cagliostro;font-size: 24px;">Search Users by 
        <a href="#" id="srchLinklcn" class="btn btn-info btn-md">
          <span id="srchGlyphIconlcn" class="glyphicon glyphicon-globe"></span><span id="srchGlyphlcn">Search By Location </span>
          <input id="srchlcn" type="text"  placeholder="Search for Users" ng-model="locn">
        </a>
        <a href="#" id="srchLinkname" class="btn btn-info btn-md">
          <span id="srchGlyphIconname" class="glyphicon glyphicon-user"></span><span id="srchGlyphname">Search By Name    </span>
          <input id="srchname" type="text"  placeholder="Search for Users" ng-model="lastnm" >
        </a>               
    </div>
  </div>
  <div class="row">
    <div class="jumbotron col-sm-12" >
        <span ng-show="names.length==0" ng-model="nouserstext" > No Users to be added as friend/family</span>
        <span style="font-family: Cagliostro;" ng-show="names.length>0" ng-model="userstext">List of Users :-</span>
    <div ng-show="names.length>0" ng-model="userstextdiv">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <td>
                        Photo
                    </td>
                    <td>
                        Name
                    </td>
                    <td>
                        Location
                    </td>
                    <td>
                        Add Button
                    </td>                    
                </tr>
            </thead>
        <tbody>
            <tr ng-repeat="x in names |filter:locn|filter:lastnm track by $index">
               <td><img src="{{x.ppic}}" class="imgg"/></td>
                <td><span>{{x.name}}</span><span hidden="true">emailhidden</span></td>
                <td><span>{{x.location}}</span></td>
                <td><button type="button" class="btn btn-primary btn-sm" ng-click="addFriend(x.email)">
          <span class="glyphicon glyphicon-plus"></span> Add as Friend
        </button>
                    <button type="button" class="btn btn-info btn-sm" ng-click="addRelative(x.email)">
          <span class="glyphicon glyphicon-plus"></span> Add as Family Member
        </button>
                </td>
            </tr>
            
        </tbody>
        </table>
    </div>    
  </div>
</div>
</body>
</html>
