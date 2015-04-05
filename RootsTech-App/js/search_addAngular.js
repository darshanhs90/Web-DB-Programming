var app=angular.module("RootsTech",[]);
	app.controller('rtCtrl',function($scope,$http){
	var page = "./php/php_search_add.php";
    $http.get(page)
    .success(function(response) {
        //alert(response);
    	$scope.names = response;
    	     });
    $scope.addFriend=function($val){
    	//alert($val);
            $http.post('./php/php_add_friend_family.php', {'mail':$val,'field':'Friend'}
                    ).success(function(data, status, headers, config) {
                        alert(data);
                           var page1 = "./php/php_search_add.php";
                                    $http.get(page1)
                                        .success(function(response) {
                                    $scope.names = response;
                        });
                    }).error(function(data, status) { 
                        alert("Error While Adding,Try Again Later");
                    });
    	//using this val add to relations table
    };
    $scope.addRelative=function($val){
    	//alert($val);
    	//using this val add to relations table
            $http.post('./php/php_add_friend_family.php', {'mail':$val,'field':'Relative'}
                    ).success(function(data, status, headers, config) {
                        alert(data);
                            var page = "./php/php_search_add.php";
                                    $http.get(page)
                                        .success(function(response) {
                                    $scope.names = response;
                        });
                    }).error(function(data, status) { 
                        alert("Error While Adding,Try Again Later");
                    });
    };
	});