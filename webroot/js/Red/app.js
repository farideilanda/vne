angular.module('vne-app',['ui.router','vne.services','vne.controllers','ui.materialize','cleave.js'])
		.run(['$rootScope', function($rootScope){
		    // Verifications Here
		    $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams) {
                if(toState.name==="app.contact")
                {
                    $rootScope.navbar_invisible = false;
                }
                else
                {
		                   $rootScope.back_theme_newsletter = 'mg_sec_background_2';
		            
                    $rootScope.navbar_invisible = true;
                }
            });
            $rootScope.$on('$viewContentLoaded', function(event, toState, toParams, fromState, fromParams) {
            });

		}])
		.config(['$httpProvider','$urlRouterProvider','$stateProvider','$locationProvider', function($httpProvider,$urlRouterProvider,$stateProvider,$locationProvider){
				// Enabling Html5Mode
				$locationProvider.html5Mode(true);
			    $locationProvider.hashPrefix('!');

			    //routing file
			    $stateProvider.state('app',{
			    	url:'/',
			    	cache:false,
			    	abstract:true,
			    	views:{
			    		"":{
			    			template:'<ui-view/>',
			    			controller:'MainCtrl as mainctrl'
			    		},
			    		"footer":{
			    			templateUrl:'/element/footer',
			    			controller:'MainCtrl as mainctrl'
			    		}
			    	}
			    })
			    .state('app.home',{
			    	url:'home?anchor',
			    	cache:false,
			    	templateUrl:'/home/home',
			    	controller:'HomeCtrl as homectrl',
					resolve:{
			    		checkCookie: ['BannerService','$state', function(BannerService,$state){
			    			return BannerService.check().then(function(response){
			    				return response;
			    			}, function(errResponse){
			    				Materialize.toast('Une erreur est survenue', 4000,'red mg-bold white-text')
			    				$state.go('app.home');
			    			});
			    		}]
			    	}
			    });

			    $urlRouterProvider.otherwise('home');


				// //Custom Setting $httpProvider
				$httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
		}])