var app = angular.module('jizRecruit', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
 
app.controller('candidatesController', function($scope, $http) {
 
	$scope.candidates = [];
	$scope.singleview = '';
	$scope.loading = false;
	$scope.baseurl = 'http://localhost/jizRecruit/public'
	$scope.newCandidate = [];
 
	$scope.init = function() {
		$scope.loading = true;
		$http.get($scope.baseurl + '/api/candidate').
		success(function(data, status, headers, config) {
			$scope.candidates = data;
			$scope.loading = false;
		});
	}

	$scope.init();
 
});

app.filter('unsafe', function($sce) { return $sce.trustAsHtml; });