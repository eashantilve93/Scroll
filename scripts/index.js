/// <reference path="angular.min.js" />
var myApp = angular.module("myModule", []);

myApp.controller("myController", function	($scope) {
	$scope.message =  "My name is Naruto Uzumaki.";
});