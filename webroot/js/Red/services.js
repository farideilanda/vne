angular.module('vne.services',[])
		.factory('NewsletterService',['$http','$q', function($http,$q){
			return{
				subscribe: function(evidence){
					return $http.post('/home/subscribe-newsletter',evidence).then(function(response){
						return response;
					}, function(errResponse){
						return $q.reject(errResponse);
					});
				}
			};
		}])
		.factory('AssistanceService',['$http','$q', function($http,$q){
			return{
				all: function(evidence){
					return $http.get('/home/service-hub',{params:{'action':'get'}}).then(function(response){
						return response;
					}, function(errResponse){
						return $q.reject(errResponse);
					});
				},
				subscribe: function(subscription){
					return $http.post('/home/service-hub',subscription).then(function(response){
						return response;
					}, function(errResponse){
						return $q.reject(errResponse);
					});
				}
			};
		}])
		.factory('SolutionService',['$http','$q', function($http,$q){
			return{
				crop_solution: function(){
					return $http.get('/home/solution',{params:{'action':'get-solutions-crop'}})
									.then(function(response){
										return response;
									}, function(errResponse){
										return $q.reject(errResponse);
									});
				},
				crop_training: function(){
					return $http.get('/home/solution',{params:{'action':'get-trainings-crop'}})
									.then(function(response){
										return response;
									}, function(errResponse){
										return $q.reject(errResponse);
									});
				},
				solution_info: function(elm){
					return $http.get('/home/solution',{params:{'action':'solution_info','object':elm},headers:{'Content-Type':'text/html'}})
					        .then(function(response){
					        	return response;
					        }, function(errResponse){
					        	return $q.reject(errResponse);
					        });
				},

				training_info: function(elm){
					return $http.get('/home/solution',{params:{'action':'training_info','object':elm},headers:{'Content-Type':'text/html'}})
					        .then(function(response){
					        	return response;
					        }, function(errResponse){
					        	return $q.reject(errResponse);
					        });
				}
			}
		}])