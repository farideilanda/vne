
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