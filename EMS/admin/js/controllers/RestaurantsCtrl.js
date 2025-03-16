angular.module('RestaurantsCtrl', []).controller('RestaurantsController', function($scope, $http,$location) {		
	
	$scope.restaurantData = {};    
	
	
	$http.get(serviceDomain+'userlistapi')
    .success(function(data) {
            //$scope.restaurants = data;
            console.log(data)
    })
    .error(function(data) {
            console.log('Error: ' + data);
    });	

    $scope.restaurantsViewMoreOnClick=function(id){
        window.location.href='#viewrestatuant/?id='+id;
        
    }

    $scope.restaurantsViewBookingeOnClick=function(id){
        window.location.href='#viewrestatuantbooking/?id='+id+'&type=booking';
        
    }

    var searchObject = $location.search();
    if(searchObject.id){
        if(!searchObject.type){
            var userData={'id':searchObject.id};
            $http.post(serviceDomain+'api/restaurant/find',userData)
            .success(function(data) {
            console.log(data);
            $scope.restaurantData = data[0];
            $scope.reataurantPhotogallerys=data[0].photoGallery;
            $scope.timingsAvailabilityLists=$scope.timingsAvailabilityListsFunc(data[0].timingsAvailabilityList);
            $scope.mealAvailabilityLists=$scope.mealAvaliablityFunc(data[0].mealAvailabilityList);
            $scope.itemDishess=data[0].itemDishes;
            $scope.cuisineTypes=$scope.cuisineTypeFunc(data[0].cuisineType);
    })
    .error(function(data) {
            console.log('Error: ' + data);
    });
        }else{
            var userData={'id':searchObject.id};
            $http.post(serviceDomain+'api/restaurant/find',userData)
            .success(function(data) {
            $scope.restaurantData = data[0];
    })
    .error(function(data) {
            console.log('Error: ' + data);
    });
        }
         
    }

    $scope.searchBookingOnClick=function(){
        var searchDate=$scope.bookingDate;
        var restaurantId=searchObject.id;
        var userData={'restaurantId':restaurantId,'dateTime':searchDate};
            $http.post(serviceDomain+'api/restaurantbookingbydate/find',userData)
            .success(function(data) {
            $scope.restaurantDatas = data;
    })
    .error(function(data) {
            console.log('Error: ' + data);
    });

    }
	
     $scope.timingsAvailabilityListsFunc = function(arr){
        for(var i in arr){
            if(arr[i].checked==true){
                arr[i].chekedStr='Open';
            }else{
                arr[i].chekedStr='Close';
            }
        }
        return arr;
    }
    $scope.mealAvaliablityFunc = function(arr){
        var returnArr=[];
        for(var i in arr){
            if(arr[i].checked==true){
                arr[i].chekedStr='Open';
                returnArr.push(arr[i]);
            }
        }
        return returnArr;
    }
    $scope.cuisineTypeFunc = function(arr){
        var returnArr=[];
        for(var i in arr){
            if(arr[i].checked==true){
                arr[i].chekedStr='Open';
                returnArr.push(arr[i]);
            }
        }
        return returnArr;
    }

	/*$scope.formData = {};
		    
		
		// when landing on the page, get all users and show them
        			        
		
		// when submitting the add form, send the text to the node API
        $scope.createUser = function() {				
                $http.post('/api/users', $scope.userData)
                        .success(function(data) {
                                $scope.userData = {}; // clear the form so our user is ready to enter another
                                $scope.users = data;
                        })
                        .error(function(data) {
                                console.log('Error: ' + data);
                        });
        };
		
		// delete a user after checking it
        $scope.deleteUser = function(id) {
                $http.delete('/api/users/' + id)
                        .success(function(data) {
                                $scope.users = data;
                        })
                        .error(function(data) {
                                console.log('Error: ' + data);
                        });
        };
		
		// edit a user after checking it
        $scope.editUser = function(id) {
                $http.get('/api/users/find/' + id)
                        .success(function(data) {
                                $scope.userData = data[0];
                        })
                        .error(function(data) {
                                console.log('Error: ' + data);
                        });
        };
		
		// edit a user after checking it
        $scope.updateUser = function() {				
                $http.post('/api/users/update' , $scope.userData)
                        .success(function(data) {
                                $scope.userData = {}; // clear the form so our user is ready to enter another
                                $scope.users = data;
                        })
                        .error(function(data) {
                                console.log('Error: ' + data);
                        });
        };*/

});