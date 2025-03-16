angular.module('DashBoardCtrl', []).controller('DashboardController', function($scope, $http,$window) {		
		
        if(sessionid=='' || sessionid==null){
                $window.location.href='/EMS'
        }

	$scope.LogoutClick=function(){
                sessionStorage.clear();
		window.location.href='/EMS';
	}

});