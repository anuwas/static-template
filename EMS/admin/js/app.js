angular.module('RestobookApp', ['ngRoute', 'appRoutes','UserCtrl','RestaurantsCtrl', 'BookingCtrl','DashBoardCtrl' ,'OnlineOrderCtrl', 'EmployeeCtrl', 'EmployeeService', 'AdvertisementCtrl']);
var serviceDomain='http://localhost:8088/EMS/';

var sessionid=sessionStorage.getItem('sessionID');
 
//var serviceDomain='http://182.18.152.39:8888/';