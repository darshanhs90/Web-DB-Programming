var app=angular.module("RootsTech",[]);
	app.controller('rtCtrl',function($scope,$http){
		$scope.editprof=false;
		$scope.list=false;
		$scope.myfeed=true;
		$scope.names=[];
		$scope.reln='';
		$scope.relnval='';
		$scope.otherreln='';
		
		$scope.selectedval='Select';
		var page = "./php/php_my_feed.php";
   			 $http.get(page)
    			.success(function(response) {
    			$scope.feed = ((response));
    	     });
    $scope.addreln=function(){
    	if($scope.selectedval=='Other')
    	{
    		$scope.relationsend=$scope.reln;
    		$scope.relationsendval=$scope.otherreln;
    	}
    	else{
    			$scope.relationsend=$scope.selectedval;
    		$scope.relationsendval=$scope.relnval;
    	}
    	//alert($scope.relationsendval);
    	//alert($scope.relationsend);
    	
    	$http.post('./php/php_add_family.php', {'reln': $scope.relationsend,'name':$scope.relationsendval}
                    ).success(function(data, status, headers, config) {
                            alert(data);
                    }).error(function(data, status) { 
                        alert("Error While Updating,Try Again");
                    });
    	//alert($scope.relationsend);
    	//alert($scope.relationsendval);
    	$scope.selectedval='Select';
    	$scope.reln='';
    	$scope.relnval='';
    	$scope.otherreln='';
    };			
	$scope.toggleeditprof=function(){
		if($scope.editprof ==true){
			$scope.editprof=false;
		}else{
			$scope.editprof=true;
			$scope.list=false;
			$scope.myfeed=false;
			$scope.family=false;
			 var page = "./php/php_edit_prof.php";
   			 $http.get(page)
    			.success(function(response) {
    			$scope.names = (response);
    	     });
		}
	};
	$scope.togglelist=function(){
		if($scope.list ==true){
			$scope.list=false;
		}else{
			$scope.list=true;
			$scope.editprof=false;
			$scope.myfeed=false;
			$scope.family=false;
			var page = "./php/php_show_friend_family.php";
   			 $http.get(page)
    			.success(function(response) {
    				//alert(response);
    			$scope.listname = (response);
    	     });
			//code to be done here
		}
	};
	$scope.togglemyfeed=function(){
		if($scope.myfeed ==true){
			$scope.myfeed=false;
		}else{
			$scope.myfeed=true;
			$scope.list=false;
			$scope.editprof=false;
			$scope.family=false;
			 var page = "./php/php_my_feed.php";
   			 $http.get(page)
    			.success(function(response) {
    			$scope.feed = (response);
    	     });
		}
	};
	$scope.togglefamily=function(){
		if($scope.family ==true){
			$scope.family=false;
		}else{
			$scope.family=true;
			$scope.list=false;
			$scope.editprof=false;
			$scope.myfeed=false;
			$scope.fam=[];
		}
	};
	
	$scope.delete=function($val1,$val2){
		//alert($val1,$val2);
		$http.post('./php/php_delete_friend_family.php', {'relation': $val2,'mail': $val1}
                    ).success(function(data, status, headers, config) {
                            alert(data);
                            var page = "./php/php_show_friend_family.php";
   					 $http.get(page)
    					.success(function(response) {
    				$scope.listname = (response);
    	     			});
                    }).error(function(data, status) { 
                        alert("Error While Deleting,Try Again");
                    });
	};

	$scope.update=function(){
		if($scope.names[0].pwd.length>8){
		$http.post('./php/php_prof_update.php', {'fname': $scope.names[0].fname,'lname': $scope.names[0].lname,
			'email': $scope.names[0].email,'pwd': $scope.names[0].pwd,'lcn': $scope.names[0].location,'ppic': $scope.names[0].ppic}
                    ).success(function(data, status, headers, config) {
                            alert(data);
                    }).error(function(data, status) { 
                        alert("Error While Updating,Try Again");
                    });
         }
         else{
          	alert("Minimum Password Length is 8 Characters");
            }
	};

	});