angular.module('CustomersCtrl', []).controller('CustomerController', function($scope, $http) {		
		
                $scope.formData = {};
                $scope.userData = {};        
                
                // when landing on the page, get all users and show them
        $http.post(serviceDomain+'api/customers')
                .success(function(data) {
                        $scope.customers = data;
                })
                .error(function(data) {
                        console.log('Error: ' + data);
                });
});