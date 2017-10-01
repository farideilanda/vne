angular.module('vne.controllers',[])
	.controller('MainCtrl',['$scope','$rootScope','NewsletterService', function($scope,$rootScope,NewsletterService){
		var self = this;
		angular.element('.carrousel-container').slick({
		          infinite: true,
		          slidesToShow: 1,
		          slidesToScroll: 1,
		          dots: false,
		          arrows:false,
		          autoplay:true,
		          fade: true,
		          cssEase: 'linear',
		          pauseOnHover:false,
		          pauseOnFocus:false   
		});            


		angular.element('.parallax').parallax();
	}])
    .controller('HomeCtrl',['$scope','$templateCache','$rootScope','AssistanceService','$location', '$anchorScroll','$stateParams','SolutionService','Workshop', function($scope,$templateCache,$rootScope,AssistanceService,$location,$anchorScroll,$stateParams,SolutionService,Workshop){
    	$templateCache.removeAll();
    	var self = this;

        // load on_display_workshop
        self.Workshop = Workshop;

        // self.Workshop.on_display_workshop().then(function(response){
        //     console.log(response);
        // }, function(errResponse){
        //     console.log(errResponse);
        // });

       angular.element('.workshop-slider').slick({
              autoplay: true,
              autoplaySpeed: 2000,
              dots:false,
              arrows:true,
              slidesToShow: 3,
              slidesToScroll: 1,
              arrows:false,
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                }
            ]
        });



        // Automate scrolls
        self.auto_scroll = function(hash){
            var hash = hash;
            $location.hash(hash);
            $anchorScroll();
        };

        self.SolutionService = SolutionService;

        // Get Crop Solutions
    	self.SolutionService.crop_solution().then(function(response){
    			self.solutions = response.data.solutions[0].it_editor_solutions;
    			self.solutions.forEach(function(elm){
                    if(elm.id==1)
                       elm.is_active = true;
                    else
    				   elm.is_active = false;
    			});

                self.load_solution_description('windows_server');

    	}, function(errResponse){
                Materialize.toast('Une erreur est survenue lors de la récupération des informations',4000,'orange bold white-text');
    	});

        self.set_active_class = function(is_active){
            console.log(is_active);
            if(is_active==true)
                return 'active';
            else
                return '';
        };

        // Get Crop Trainings
        self.SolutionService.crop_training().then(function(response){
                self.trainings = response.data.trainings[0].it_editor_solutions;
                self.trainings.forEach(function(elm){
                    if(elm.id==11)
                       elm.is_active = true;
                    else
                       elm.is_active = false;
                });
                self.load_training_description('ec_council');
        }, function(errResponse){
                Materialize.toast('Une erreur est survenue lors de la récupération des informations',4000,'orange bold white-text');
        });


    	self.load_solution_description = function(elm){
            if(typeof(elm)==='string')
                var index_url = elm
            else
                var index_url = elm.solution_alias;

    		self.is_loading_solution = true;
    		self.SolutionService.solution_info(index_url).then(function(response){
    			angular.element('#super').empty().append(response.data);
    		}, function(errResponse){
    			console.log(errResponse);
    		}).finally(function(){
    		    self.is_loading_solution = false;
    		});
    	};



        self.load_training_description = function(elm){

            if(typeof(elm)==='string')
                var index_url = elm
            else
                var index_url = elm.solution_alias;

            self.is_loading_training = true;
            self.SolutionService.training_info(index_url).then(function(response){
                angular.element('#super-2').empty().append(response.data);
            }, function(errResponse){
                console.log(errResponse);
            }).finally(function(){
                self.is_loading_training = false;
            });
        };
	}])