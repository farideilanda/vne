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

        // Newsletter        
        self.newsletter = function(newsletter){
            self.is_newsletter_subscribing = true;
            newsletter.newsletter_token = 'default';
            NewsletterService.subscribe(newsletter).then(function(response){
                Materialize.toast('Félicitations, votre demande a été enregistrée',4000,'mg_prim_background white-text bold');
                newsletter.newsletter_email = '';
                $rootScope.openNewsletterModal = false;
            }, function(errResponse){
               switch(errResponse.status){
                case 401:
                    Materialize.toast('Cette adresse existe déjà',4000,'orange white-text bold');
                break;

                default:
                   Materialize.toast('Une erreur est survenue, veuillez réessayer',4000,'orange white-text bold');
                break;
               }
            }).finally(function(){
                self.is_newsletter_subscribing = false;
            });     
        };
	}])
    .controller('HomeCtrl',['$scope','$templateCache','$rootScope','AssistanceService','$location', '$anchorScroll','$stateParams','SolutionService','Workshop','QuoteService','checkCookie','NewsletterService', function($scope,$templateCache,$rootScope,AssistanceService,$location,$anchorScroll,$stateParams,SolutionService,Workshop,QuoteService,checkCookie,NewsletterService){
    	$templateCache.removeAll();
    	var self = this;   
        // Quote Logic
        self.QuoteService = QuoteService;
        self.QuoteService.get_quote_assets().then(function(response){
            self.types_quote = response.data.solution_types;
            self.solutions_quote = response.data.cross_solution_types;

            self.quote = {
                type: self.types_quote[0],
                solution: '',
                quote_subscriber_fullname: '',
                quote_subscriber_tel: '',
                quote_is_enterprise:false
            };
        }, function(errResponse){
            console.log(errResponse);
        });

        self.reset_quote = function(){
            self.quote = {
                type: self.types_quote[0],
                solution: '',
                quote_subscriber_fullname: '',
                quote_subscriber_tel: '',
                quote_is_enterprise:false
            };
        };

        self.closeModalQuote = function(){
            angular.element('.modal-overlay').triggerHandler('click');
            self.reset_quote();
        };

        self.change_solution_type = function(index){
            self.quote.type = self.types_quote[index];
        };


        self.submit_quote = function(quote){
            self.sending_quote = true;
            self.QuoteService.send_quote(quote).then(function(response){
                Materialize.toast('Felicitation votre demande a été prise en compte',4000,'mg_prim_background bold white-text');
                self.closeModalQuote();
            }, function(errResponse){
                switch(errResponse.status)
                {
                    case 400:
                        Materialize.toast('Un problème est survenue lors de l\'opération',4000,'orange bold white-text');
                    break;

                    case 401:
                        Materialize.toast('Erreurs formulaire',4000,'orange bold white-text');
                    break;
                }
            }).finally(function(){
                self.sending_quote = false;
            });
        };

        self.evalute_solution_item ={
            'function': function(t){
                let temp_solution_types = t.it_solution_types;

                for(let key in temp_solution_types){
                    if(temp_solution_types[key].id==self.quote.type.id)
                        return t;
                }
            }
        };

        //Workshops Logic
        // load on_display_workshop
        self.Workshop = Workshop;
            self.is_poster_loading = true;
        self.Workshop.on_display_workshop().then(function(response){
            self.poster = response.data.poster;
            if(self.poster!=null)
            {
                var months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
                for(let i in months)
                {
                     i++;
                    if (i == parseInt(self.poster.ref_month))
                        self.poster.ref_month_full = months[i-1];
                }


                //treatment on full description
                let poster_full_description = self.poster.workshop_long_description.split(' ');
                let first_part_description = poster_full_description.slice(0,66);
                let second_part_description = poster_full_description.slice(66, poster_full_description.length);
                self.poster.first_part_description = first_part_description.join(' ');
                self.poster.second_part_description = second_part_description.join(' ');
                //workshop form
                angular.element('#workshop-form').append(self.poster.workshop_embeded_path);
                self.hide_poster_workshop = false;
            }
            else
            {
                self.hide_poster_workshop = true;
            }
        }, function(errResponse){
                self.hide_poster_workshop = true;
                Materialize.toast('Une erreur est survenue lors de la récupération-affiche',4000,'orange white-text bold');
        }).finally(function(){
            self.is_poster_loading = false;
        });

        self.Workshop.slider_wokshop().then(function(response){
            self.workshops = response.data.workshops;
            self.workshops.forEach(function(element,index){
                var months = ['Jan','Fev','Mar','Avr','Mai','Jui','Juil','Août','Sept','Oct','Nov','Dec'];
                for(let i in months)
                {
                     i++;
                    if (i == parseInt(element.ref_month))
                        element.ref_month_full = months[i-1];
                }
            });
        }, function(errResponse){  
            console.log(errResponse);
        }).finally(function(){

        });

        $scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
              $('.workshop-slider').slick({
              autoplay: true,
              autoplaySpeed: 2000,
              dots:true,
              arrows:true,
              slidesToShow: 3,
              slidesToScroll: 1,
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 2,
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
        });


        // Automate scrolls
        self.auto_scroll = function(hash){
            var hash = hash;
            $location.hash(hash);
            $anchorScroll();
        };

        if($stateParams.anchor)
            self.auto_scroll($stateParams.anchor);


        //Solutions logic
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
            if(is_active==true)
                return 'active-item-collapsible';
            else
                return '';
        };

    	self.load_solution_description = function(elm){

            if(typeof(elm)==='string')
            {
                var index_url = elm;
                self.load_solution_description_service(index_url);
            }
            else
            {
                if(elm.is_active)
                {
                    elm.is_active = true;
                    return false;
                }
                else
                {
                   elm.is_active = true;
                   self.renew_selection_cycle_solutions(elm);
                   var index_url = elm.solution_alias;
                   self.load_solution_description_service(index_url);
                }
            }
    	};

        self.renew_selection_cycle_solutions = function(element){
            self.solutions.forEach(function(item){
                if(item.id != element.id)
                    item.is_active = false;
            });
        };

        self.load_solution_description_service = function(index){
            self.is_loading_solution = true;
            self.SolutionService.solution_info(index).then(function(response){
                angular.element('#super').empty().append(response.data);
            }, function(errResponse){
                Materialize.toast('Une erreur est survenue',4000,'orange white-text bold');
            }).finally(function(){
                self.is_loading_solution = false;
            });
        };

        // Training Logic
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

        self.load_training_description = function(elm){

            if(typeof(elm)==='string')
            {
                var index_url = elm;
                 self.load_training_description_service(index_url);
            }
            else{
                if(elm.is_active)
                {
                    elm.is_active = true;
                    return false;
                }
                else
                {
                   elm.is_active = true;
                   self.renew_selection_cycle_trainings(elm);
                   var index_url = elm.solution_alias;
                   self.load_training_description_service(index_url);
                }
            }
        };


        self.load_training_description_service = function(index){
            self.is_loading_training = true;
            self.SolutionService.training_info(index).then(function(response){
                angular.element('#super-2').empty().append(response.data);
            }, function(errResponse){
                Materialize.toast('Une erreur est survenue lors de la récupération des données',4000,'orange white-text bold');
            }).finally(function(){
                self.is_loading_training = false;
            });
        };

        self.renew_selection_cycle_trainings = function(element){

                self.trainings.forEach(function(item){
                    if(item.id != element.id)
                        item.is_active = false;
                });

        };



        // banner newsletter
        if(checkCookie.data.banner_state === "undone")
                $rootScope.openNewsletterModal = true;

	}]).directive('onFinishRender',['$timeout', function($timeout){
        return{
            restrict:'A',
            link: function(scope, element, attr){
                if(scope.$last === true){
                    $timeout(function(){
                        scope.$emit(attr.onFinishRender)
                    });
                }
            }
        }
    }])