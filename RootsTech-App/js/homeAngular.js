var app=angular.module("RootsTech",[]);
	app.controller('rtCtrl',function($scope,$http){
        $scope.feed=[];
        $scope.x=false;
		  var page = "./php/php_friend_family_feed.php";
             $http.get(page)
                .success(function(response) {
                $scope.feed = (response);
             });
         $http.post('./php/php_get_family_info.php')
                    .success(function(data, status, headers, config) {
                            $scope.y=data;
                    }).error(function(data, status) { 
                        alert("Error While Fetching Data,Try Again");
                    });        
        $scope.post=function(){
			$http.post('./php/php_post_update.php', {'txt':$scope.txt}
                    ).success(function(data, status, headers, config) {
                            alert(data);
                            $scope.txt='';
                    }).error(function(data, status) { 
                        alert("Error While Updating,Try Again");
                    });
		};

        $scope.postfamily=function(){
            $http.post('./php/php_post_update.php', {'txt':$scope.txt}
                    ).success(function(data, status, headers, config) {
                            $scope.txt='';
                    }).error(function(data, status) { 
                        alert("Error While Updating,Try Again");
                    });
        };        
	});