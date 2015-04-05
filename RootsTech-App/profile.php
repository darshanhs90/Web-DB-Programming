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
    <script src="js/angular.min.js"></script>
    <script src="js/profile.js"></script>
    <script src="js/profileAngular.js"></script>
    
    
    <!-- my image with list of friends and family members -->
</head>

<body ng-controller="rtCtrl">
    
<span id="prfl" style="display: none;"><?php echo $_SESSION['user_mail'];?></span>
<div class="container">
  <div class="pull-right row">
  <ul class="nav nav-pills col-sm-12" role="tablist">
        <li><a href="home.php">Home</a></li>
        <li><a href="search_add.php">List Users</a></li>
        <li class="active"><a href="profile.php">My Profile</a></li>
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
  <div class="jumbotron col-sm-12">
<!--    Add 2 buttons,which dynamically shows the list of family members of the update form-->
    <button class="btn btn-info" name="myfeed" ng-click="togglemyfeed()">My Updates</button>
    <button class="btn btn-info" name="profile" ng-click="toggleeditprof()">Edit Profile</button>
    <button class="btn btn-info" name="friends" ng-click="togglelist()">Show Friends and Family</button>
    <button class="btn btn-info" name="family" ng-click="togglefamily()">Build Family Tree</button>   
    <img class="pull-right imgg" id="profpic" src="" alt="No Image" >
  </div>
  </div>
  <div class="row" ng-show="editprof"><!--ng-show=""-->
    <div class="jumbotron col-sm-12" >
    <form role="form" class="col-sm-6" name="myForm" novalidate ng-repeat="x in names track by $index">
       <div class="row">
       <div class="form-group col-sm-6">
      <label for="name">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter Firstname" required="true" ng-model="x.fname" >
    </div>
       <div class="form-group col-sm-6">
      <label for="name">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Lastname" required="true" ng-model="x.lname">
    </div>
       </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" required="true" disabled="true" ng-model="x.email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Change password" required="true" ng-model="x.pwd" title="Minimum Password Length is 8 Characters">
    </div>
   <div class="form-group">
      <label for="lcn">Location:</label>
      <input type="text" class="form-control" id="lcn" placeholder="Enter Location" required="true" ng-model="x.location">
    </div>
    <div class="form-group">
      <label for="ppic" title="Use sites like postimage.org">Profile Picture</label>
      <input type="url" class="form-control" id="ppic" placeholder="Enter Url Link" required="true" title="Use sites like postimage.org" ng-model="x.ppic">
    </div>    
    <button type="submit" class="btn btn-default" ng-show="myForm.$invalid" ng-disabled="myForm.$invalid" id="sbmt">Update Changes</button>
    <button type="button" class="btn btn-success" ng-show="myForm.$valid" id="btnsbmt" ng-click="update()">Update Changes</button>
    </form>
    </div>
  </div>
  <div class="row" ng-show="list"><!--ng-show=""-->
    <div class="jumbotron col-sm-12" >
        <span style="font-family: Cagliostro;" ng-hide="listname.length==0">List of Friends/Family Members</span>
        <br/>
        <div ng-show="listname.length==0" ng-model="showlength">Zero Friends/Family Added</div>
        <br/>
    <div ng-show="listname.length>0"><!-- ng-repeat=""-->
        <table class="table table-hover table-striped">
            <!--<thead>
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
                        Relation
                    </td>
                    <td>
                        Delete Button
                    </td>                    
                </tr>
            </thead>-->
        <tbody>
            <tr ng-repeat="x in listname track by $index">
                <td><img src="{{x.ppic}}" class="imgg"/></td>
                <td style="text-align: center;vertical-align:middle;"><strong><span style="font-family: Cagliostro;font-size:medium;font-variant: small-caps;">{{x.fname}} {{x.lname}}</span></strong></td>
                <td style="text-align: center;vertical-align:middle;"><span style="font-family: Cagliostro;font-size:medium;">{{x.lcn}}</span></td>
                <td style="text-align: center;vertical-align:middle;"><span style="font-family: Cagliostro;font-size:medium;">{{x.relation}}</span></td>
                <td style="text-align: center;vertical-align:middle;"><button type="button" class="btn btn-danger btn-sm" ng-click="delete(x.email,x.relation)">
                    <span class="glyphicon glyphicon-remove" ></span> Remove 
                    </button>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
  </div>
  <div class="row" ng-show="myfeed==true"><!--ng-show=""-->
    <div class="jumbotron col-sm-12" >
        <span style="font-family: Cagliostro;font-size:24px;" ng-show="feed.length>0" ng-model="updttext">My Updates</span>
        <br/>
    <div ng-show="feed.length==0" ng-model="showlength">Zero Updates</div>
    <br/>
        <div ng-show="feed.length>0" ng-repeat="x in feed track by $index"><!-- ng-repeat=""-->
        <div style="border:1px solid;border-radius: 10px;"><span style="color: lightblue;word-wrap: break-word;">  {{x.msgs}}</span>
        </div>
        <span class="pull-right">Posted on {{x.tmstamp}}</span>
        <hr/>
        </div>
        </div>
    </div>
  <div class="row" ng-show="family"><!--ng-show=""-->
    <div class="jumbotron col-sm-12" >
        <span style="font-family: Cagliostro;font-size:24px;" >Add Family Members</span>
        <br/>
        <span>Select Relation</span>
        <div class="row">
            <div class="col-sm-4">
            <select class="form-control" ng-model="selectedval">
                <option selected>Select</option>
                <option >Father</option>
                <option >Mother</option>
                <option >Brother</option>
                <option >Sister</option>
                <option >GrandFather</option>
                <option >GrandMother</option>
                <option >Cousin</option>
                <option >Niece</option>
                <option >Nephew</option>
                <option >Other</option>
            </select>
            </div>
        
        <div class="col-sm-4">    <form name="myform">
        <input type="text" class="form-control col-sm-4" placeholder="Enter Relation" ng-show="selectedval=='Other'" ng-model="reln" required>
        </form>
        <form name="myform1">
        <input type="text"  class="form-control col-sm-8" ng-model="relnval" placeholder="Enter name of your {{selectedval}}" required ng-hide="selectedval=='Other' || selectedval=='Select'">
        </form>
        <form name="myform2">
            <input type="text" class="form-control col-sm-4" placeholder="Enter name of your {{reln}}" ng-show="selectedval=='Other'"  required ng-model="otherreln">   
        </form>
        </div>
        </div>
        <button ng-click="addreln()" class="btb btn-success" ng-show="((myform.$dirty && myform2.$dirty && myform.$valid && myform2.$valid)|| (myform1.$dirty && myform1.$valid)&& selectedval!='Select')">Add Relation</button>
    </div>
  </div>
</div>
</div>
    </div>
  </div>
</div>
</body>
</html>
