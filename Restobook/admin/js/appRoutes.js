angular.module('appRoutes', []).config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {

	$routeProvider

		// home page
		.when('/', {
			templateUrl: 'views/dashboard.html',
		})
		.when('/restaurants', {
			templateUrl: 'views/restaurants.html',
			controller: 'RestaurantsController'
		})
		.when('/viewrestatuant', {
			templateUrl: 'views/viewrestaurant.html',
			controller: 'RestaurantsController'
		})
		.when('/viewrestatuantbooking', {
			templateUrl: 'views/restaurantbooking.html',
			controller: 'RestaurantsController'
		})
		.when('/customers', {
			templateUrl: 'views/customers.html',
			controller: 'CustomerController'	
		})
		.when('/advertisement', {
			templateUrl: 'views/advertisement.html',
			controller: 'AdvertisementController'	
		})
		.when('/createadvertisement', {
			templateUrl: 'views/createadvertisement.html',
			controller: 'AdvertisementController'	
		})
		.when('/editadvertisement', {
			templateUrl: 'views/editadvertisement.html',
			controller: 'AdvertisementController'	
		})
		.when('/bookings', {
			templateUrl: 'views/booking.html',
			controller: 'BookingController'	
		})
		.when('/onlineorder', {
			templateUrl: 'views/onlineorder.html',
			controller: 'OnlineOrderController'	
		})
		
		.when('/product', {
			templateUrl: 'views/product.html',
			controller: 'ProductController'	
		})
		.when('/customer', {
			templateUrl: 'views/customer.html',
			controller: 'CustomerController'	
		})
		.when('/client', {
			templateUrl: 'views/client.html',
			controller: 'ClientController'	
		});
	
	

}]);