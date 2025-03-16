angular.module('appRoutes', []).config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {

	$routeProvider

		// home page
		.when('/', {
			templateUrl: 'views/dashboard.html',
		})
		.when('/users', {
			templateUrl: 'views/user.html',
			controller: 'UserController'	
		})
		.when('/newuser', {
			templateUrl: 'views/newuser.html',
			controller: 'UserController'
		})
		.when('/edituser', {
			templateUrl: 'views/edituser.html',
			controller: 'UserController'
		})
	

}]);