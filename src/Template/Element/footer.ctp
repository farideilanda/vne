  <footer class="page-footer grey darken-3">
          <div class="container">
            <div class="row">
              <div class="col l4 s12 m12 mg-padding-left-0">
                <h5 class="orange-text">Menu</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#bienvenue">Bienvenue</a></li>
                  <li><a class="grey-text text-lighten-3" href="#prestations">Prestations</a></li>
                  <li><a class="grey-text text-lighten-3" href="#solutions">Solutions</a></li>
                  <li><a class="grey-text text-lighten-3" href="#workshops">Ateliers</a></li>
                  <li><a class="grey-text text-lighten-3" href="#trainings">Formations</a></li>
                  <li><a class="grey-text text-lighten-3" href="#contact">Contact</a></li>
                  <li><a class="grey-text text-lighten-3 pointer" data-target="quoteModal" modal dismissible="true">Demander une cotation</a></li>
                  <li><a href="https://www.office.com/?auth=2" target="_blank" class="grey-text text-lighten-3 pointer">Webmail</a></li>
                </ul>
              </div>

              <div class="col l5 s12 m12 mg-padding-left-0">
                <h5 class="orange-text">Adresse</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Cocody Mermoz-Rue C10</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">01 BP 1610 ABIDJAN 01</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Abidjan-Côte d'Ivoire</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Tel: +225 22 48 88 88 / Cel: +225 48 21 94 94</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Fax: +225 22 48 03 02</a></li>
                   <li><a class="grey-text text-lighten-3" href="#!">E-Mail: info@vne-ci.com</a></li>
                </ul>
                <ul>
                	 
                </ul>
              </div>

              <div class="col l3 s12 m12 mg-padding-left-0">
                <h5 class="orange-text">Restons connectés</h5>
	                <p class="left-align">
                    <a class="hvr-shrink" href="https://www.linkedin.com/company/11309570/" target="_blank">
                      <i class="ion-social-linkedin-outline mg-size-50 orange-text mg-margin-right-20"></i>
                    </a>
                    <a class="hvr-shrink" href="https://twitter.com/VNEntreprise" target="_blank">
                      <i class="ion-social-twitter-outline mg-size-50 orange-text mg-margin-right-20"></i>
                    </a>
						        
						        <i class="ion-social-skype-outline mg-size-50 orange-text tooltipped hvr-shrink" data-tooltip="vne.business" data-position="top" data-delay="5s"></i>
	                </p>

              </div>
            </div>

            <div class="row">
              <div class="col l4 s12 m12 mg-padding-left-0">
                <span class="mg-semi white-text">Restez connecté au réseau d'information de Virtual Network Entreprise</span>
              </div>
              <form name="newsletter_subscription" ng-submit="mainctrl.newsletter(newsletter)">
                <div class="col l6 s12 m12 mg-margin-top-0 input-field contrast-input mg-padding-0 mg-padding-left-0">
                      <input type="email" required placeholder="E-Mail" ng-model="newsletter.newsletter_email" ng-pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-z]{2,8}$/">
                </div>
                <div class="col l2 s12 m12 mg-margin-top-0 mg-padding-0">
                     <button type="submit" ng-disabled="newsletter_subscription.$invalid || mainctrl.is_newsletter_subscribing" class="btn mg-height-48 orange white-text mg-padding-top-5 bold mg-width-100-perc">Soumettre</a>
                </div>
              </form>
            </div>
            
          </div>
          <div class="footer-copyright mg_prim_background">
            <div class="container">
            © 2017 Virtual Network Entreprise - Tous droits réservés
            <a href="https://www.riehl-emmanuel.xyz" class="grey-text text-lighten-4 right" href="#!">Made With ❤️ By Red 
           </a>

            </div>
          </div>
        </footer>

        <script>$('.tooltipped').tooltip();</script>