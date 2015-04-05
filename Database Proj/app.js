var app=angular.module("myApp",[]);
app.controller("ctrl",function($scope,$http){
		$scope.one=true;
		//$scope.two=false;
		$scope.three=false;
		$scope.four=false;
		$scope.five=false;
		$scope.fltData='';
        $scope.fareData='';
        $scope.listPass='';
		$scope.passInfo='';
		$scope.seats='';
		$scope.connData='';
		$scope.oneshow=function(){
			$scope.one=true;
			//$scope.two=false;
			$scope.three=false;
			$scope.four=false;
			$scope.five=false;
			$('#li1').addClass('active');
			//$('#li2').removeClass('active');
			$('#li3').removeClass('active');
			$('#li4').removeClass('active');
			$('#li5').removeClass('active');
				
		};
		/*$scope.twoshow=function(){
			$scope.one=false;
			$scope.two=true;
			$scope.three=false;
			$scope.four=false;
			$scope.five=false;
			$('#li2').addClass('active');
			$('#li1').removeClass('active');
			$('#li3').removeClass('active');
			$('#li4').removeClass('active');
			$('#li5').removeClass('active');
		};*/
		$scope.threeshow=function(){
			$scope.one=false;
			//$scope.two=false;
			$scope.three=true;
			$scope.four=false;
			$scope.five=false;
			$('#li3').addClass('active');
			//$('#li2').removeClass('active');
			$('#li1').removeClass('active');
			$('#li4').removeClass('active');
			$('#li5').removeClass('active');
		};
		$scope.fourshow=function(){
			$scope.one=false;
			//$scope.two=false;
			$scope.three=false;
			$scope.four=true;
			$scope.five=false;
			$('#li4').addClass('active');
			//$('#li2').removeClass('active');
			$('#li3').removeClass('active');
			$('#li1').removeClass('active');
			$('#li5').removeClass('active');
		};
		$scope.fiveshow=function(){
			$scope.one=false;
			//$scope.two=false;
			$scope.three=false;
			$scope.four=false;
			$scope.five=true;
			$('#li5').addClass('active');
			//$('#li2').removeClass('active');
			$('#li3').removeClass('active');
			$('#li4').removeClass('active');
			$('#li1').removeClass('active');
		};
		$scope.conn='a';
		$scope.cnct='0';
		$scope.getFlight=function(){
			$http.post('./php/php_get_flight.php', {'dep_code':$scope.depp,'arr_code':$scope.arrr}
                    ).success(function(data, status, headers, config) {
                    		if(data!='Invalid query')
                            	$scope.fltData=data;
                            else
                            	{

                            		$scope.conn='';
                            	}
                    }).error(function(data, status) { 
                    	alert("Error While Updating,Try Again");
                    });
        };    

        $scope.getConnFlight=function(){
			$http.post('./php/php_get_conn_flight.php', {'dep_code':$scope.depp,'arr_code':$scope.arrr,'cnct':$scope.cnct}
                    ).success(function(data, status, headers, config) {
                    	
                    	if(data=='Invalid query'){
                    		alert('Invalid');
                    	}
                    	console.log(data);
                    	$scope.connData=data;
                    }).error(function(data, status) { 
                    	alert("Error While Updating,Try Again");
                    });
        };  

        $scope.getSeats=function(){        	
        	$http.post('./php/php_get_seats.php', {'dep_code':$scope.depp2,'arr_code':$scope.arrr2}
                    ).success(function(data, status, headers, config) {

                            $scope.seats='The Number of Seats is :'+data[0].Seats;
                    }).error(function(data, status) { 
                        alert("Error While Updating,Try Again");
                    });
        };       


        $scope.getFare=function(){
        	//alert('getFare');
        	$http.post('./php/php_get_fare.php', {'dep_code':$scope.depp3}
                    ).success(function(data, status, headers, config) {
                    	//console.log(data);
                    	//alert(data);
                            if(data!='Invalid query'){
                            	$scope.fareData=data;
                            }
                            else
                            	alert(data);
                    }).error(function(data, status) {
                    	console.log("error");
                        alert("Error While Updating,Try Again");
                    });
        };       
		
        $scope.getPassengers=function(){
        	//alert('getPassengers');
        	 $http.post('./php/php_get_list_of_passengers.php', {'flt':$scope.depp4,'date':$scope.arrr4}
                    ).success(function(data, status, headers, config) {
                    	//alert(data);
                    		//console.log(data);
                            $scope.listPass=data;
                    }).error(function(data, status) { 
                        alert("Error While Updating,Try Again");
                    });
        };       


        $scope.getList=function(){
        	//alert('getPassInfo');
			$http.post('./php/php_get_passengers_info1.php', {'name':$scope.name}
                    ).success(function(data, status, headers, config) {
                            $scope.passInfo=data;
                    }).error(function(data, status) { 
                        alert("Error While Updating,Try Again");
                    });
        };   
	});