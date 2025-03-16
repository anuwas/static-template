angular.module('UserCtrl', []).controller('UserController', function($scope, $http,$location,$route) {		
		
                $scope.formData = {};
                $scope.userData = {};        
                $scope.editusers={};
                // when landing on the page, get all users and show them
                console.log(sessionid);
        $http.get(serviceDomain+'userlistapi/'+sessionid)
                .success(function(data) {
                        console.log(data);
                        $scope.users = data;
                })
                .error(function(data) {
                        console.log('Error: ' + data);
                });

                $http.get(serviceDomain+'countrylistapi')
                                .success(function(data) {
                                        $scope.chooseCountries = data;
                                       // console.log(data);

                                })
                                .error(function(data) {
                                        console.log('Error: ' + data);
                 });

                 $http.get(serviceDomain+'citylistapi')
                                .success(function(data) {
                                        $scope.cities = data;
                                       // console.log(data);
                                })
                                .error(function(data) {
                                        console.log('Error: ' + data);
                        });

                $scope.createNewUserBtnClick=function(){
                      window.location.href='#/newuser';
                }

                var searchObject = $location.search();

                 if(searchObject.id)
                 {
                       $http.get(serviceDomain+'getuser/'+sessionid+'/'+searchObject.id)
                        .success(function(data) {
                        console.log(data);
                        $scope.first_name = data.first_name;
                        $scope.last_name=data.last_name;
                        $scope.username=data.username;
                        $scope.email=data.email;
                        $scope.password=data.password;
                        $scope.address=data.address;
                        $scope.selectedCityMasterID=(data.cityMaster.city_id).toString();
                        $scope.selectedCountryMasterID=(data.countryMaster.country_id).toString();
                        })
                        .error(function(data) {
                                console.log('Error: ' + data);
                        });
                 }

                 $scope.updateUserBtnClick=function(id){
                       window.location.href='#/edituser/?id='+id;
                }

                 $scope.updateUserClickBtn=function(){
                        var userData={'user_id':searchObject.id,
                                'first_name':$scope.first_name,
                                'last_name':$scope.last_name,
                                'username':$scope.username,
                                'email':$scope.email,
                                'password':$scope.password,
                                'countryMaster':{'country_id':$scope.selectedCountryMasterID},
                                'cityMaster':{'city_id':$scope.selectedCityMasterID},
                                'address':$scope.address}

                        $http.put(serviceDomain+'updateuserapi/'+sessionid, userData)
                .success(function(data) {
                        console.log(data);
                        window.location.href='#/users';
                })
                .error(function(data) {
                        console.log('Error: ' + data);
                });
                 }

                

                $scope.deleteUserBtnClick=function(id){
                        if(id){
                                 $http.delete(serviceDomain+'deleteuserapi/'+sessionid+'/'+id)
                        .success(function(data) {
                        console.log(data);
                        alert('deleted');
                        $route.reload();
                        })
                        .error(function(data) {
                                console.log('Error: ' + data);
                        });
                        }
                }

                $scope.createNewUser=function(){
                        var userData={'first_name':$scope.first_name,
                                'last_name':$scope.last_name,
                                'username':$scope.username,
                                'email':$scope.email,
                                'password':$scope.password,
                                'countryMaster':{'country_id':$scope.country_id},
                                'cityMaster':{'city_id':$scope.city_id},
                                'address':$scope.address}
                                console.log(userData);
                 $http.post(serviceDomain+'saveuserapi/'+sessionid, userData)
                .success(function(data) {
                        console.log(data);
                        window.location.href='#/users';
                })
                .error(function(data) {
                        console.log('Error: ' + data);
                });
                }
});