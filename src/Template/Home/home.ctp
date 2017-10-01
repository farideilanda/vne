<style>
	.collapsible-header.active{
		background: orange !important;
	}
</style>

<!-- Start Bienvenue -->
<div id="bienvenue" class="scrollspy">
	<div class="row relative-block mg_prim_background mg-margin-bottom-0">
			<div class="row absolute-block mg-width-100-perc left-align mg-padding-left-15" style="top:0px;left:0px;z-index: 1;">
		      <div class="col s12 m6 l5">
		          <div class="card white-text mg-margin-top-30" style="background-color:rgba(255, 255, 255, 0.8) !important;">
		            <div class="card-content white-text">
		              <span class="card-title uppercase mg-size-46 bold mg_prim_color">Integrateurs</span> <br>
		              <span class="card-title uppercase mg-size-46 bold mg_prim_color">de solutions</span> <br>
		              <span class="txt-rotate card-title uppercase mg-size-46 bold mg_prim_color" data-period="150" data-rotate='[ "éssentielles.","pros.","innovantes.","productives","robustes."]'></span> <br>

		              <p class="mg-semi black-text">Accédez à un univers de possibilités au travers des solutions et ateliers proposés par Virtual Nertwork Entreprise afin de relevez les defis de l'informatique d'aujourd'hui à savoir la productivité, la sécurité et l'optimisation de la gestion de l'entièreté de votre infrastructure cloud, virtuelle et locale.</p>
		            </div>
		            <div class="card-action" style="border-top:2px solid orange;">
		              <a class="mg_prim_background white-text btn bold" ng-click="homectrl.auto_scroll('solutions')">Découvrir</a>
		              <a style="border:2px solid orange;" class="bold btn orange white-text" ng-click="homectrl.auto_scroll('workshops')">Ateliers</a>
		            </div>
		          </div>
		        </div>
		    </div>

		   <div class="parallax carrousel-container">
		   		    <div class="">
		               <?= $this->Html->image('assets/home/main-background-6.jpg',['style'=>'width:100%;display:block;']) ?>
		            </div>
		            <div class="">
		               <?= $this->Html->image('assets/home/main-background-2.jpg',['style'=>'width:100%;display:block;']) ?>
		            </div>
		            <div class="">
		               <?= $this->Html->image('assets/home/main-background-9.jpg',['style'=>'width:100%;display:block;']) ?>
		            </div>

		            <div class="">
		               <?= $this->Html->image('assets/home/main-background-8.png',['style'=>'width:100%;display:block;']) ?>
		            </div> 
		            <div class="">
		               <?= $this->Html->image('assets/home/main-background-3.jpg',['style'=>'width:100%;display:block;']) ?>
		            </div> 	
		    </div>
	</div>


	<!-- pictogramm description vne -->
	<div class="row mg-padding-top-50 mg_prim_background mg-padding-bottom-50 mg-margin-bottom-0" >
	   <div class="container">
			<div class="col s4">
				<?= $this->Html->image('assets/home/action-sprite-2.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
				<span class="white-text relative-block left-align bold" style="top:10px;">Améliorer la productivité de votre entreprise</span>
				<p class="mg-regular mg_sec_color_3 mg-padding-top-20 bold" style="clear: both;">
					Besoin de plus de mobilité et d'outils permettant d'assurer une complète prise en charge de vos objectifs tout en restant dans une stratégie collaborative, autants d'arguments et de problématiques considérés et résolus par nos propositions d'intégration. 
				</p>
			</div>
			<div class="col s4">
				<?= $this->Html->image('assets/home/action-sprite-3.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
				<span class="white-text relative-block left-align bold" style="top:10px;">Sécurisez votre activité numérique </span>
				<p class="mg-regular mg_sec_color_3 mg-padding-top-20 bold" style="clear: both;">Nécessité de vous protégez contre la perte/fuite d'information, de vous prémunir contre des attaques externes ? Nos experts après étude, conduisent pleinement toutes les phases d'intégration de la solution qui vous correspond.</p>
			</div>
			<div class="col s4">
				<?= $this->Html->image('assets/home/action-sprite-1.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
				<span class="white-text relative-block left-align bold" style="top:10px;">Optimisez votre gestion</span>
				<p class="mg-regular mg_sec_color_3 mg-padding-top-20 bold" style="clear: both;">
				   Les nombreuses problématiques posées par la multiplicité des environnements cloud, virtuels et locaux dont la surveillance des informations et les remontées d'alerte en temps réels sont au coeur de nos préoccupations et sont clairements résolus dans nos propositions.
				</p>
			</div>
			<div class="col s12 center mg-margin-top-20 mg-padding-0">
				<a class="btn mg-button-3 white-text bold" ng-click="homectrl.auto_scroll('solutions')">Découvrir nos solutions</a>
			</div>
	   </div>
	</div>

	<!-- Actual Workshop -->
	<div class="row mg-padding-top-50 mg-padding-bottom-50 mg-margin-bottom-0" style="background:url('/img/assets/home/back-tech-4.png') #C1872A no-repeat;">
	   <div class="container">
		    <div class="col s6"  data-aos="zoom-in-down">
				<h6 class="uppercase mg-margin-left-10 white-text bold">Atelier à l'affiche</h6>
				<div class="divider"></div>
				<h4 class="uppercase mg-padding-top-10 bold white-text" style="clear:both;">Netwrix Auditor ou comment réaliser un audit informatique complet</h4>
				<h5 class="mg-padding-top-10 bold white-text" style="clear:both;">26 Septembre 2017 - 08H00</h5>
				<p class="mg-regular white-text">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia unde deleniti beatae reiciendis fuga cupiditate, dignissimos ab atque quibusdam inventore in! Dignissimos, expedita nemo iste, iusto in autem minus doloremque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A quia pariatur qui, eos excepturi eveniet. Aperiam quis quasi facere, possimus libero minus rem quia recusandae perspiciatis perferendis? Ad, mollitia, a.
				</p>
			</div>
			<div class="col s6" data-aos="zoom-in-down">
				<p class="mg-regular white-text">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto dolores perferendis ducimus sed provident possimus eveniet. Natus suscipit quae expedita sunt maiores sequi aliquid praesentium, quia nihil nesciunt quos. Voluptatibus.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptas accusamus, nobis esse consectetur iste, dolores maxime eius quia. Enim nesciunt, quod sunt culpa temporibus minus non dolor quibusdam commodi! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum voluptas, molestiae dolores numquam modi similique facilis voluptates sint quasi placeat. Nihil asperiores perferendis dolorum nesciunt nam architecto ratione neque similique. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi vel aspernatur laudantium libero quasi saepe harum consectetur.
				</p>
			    	<div class="col s12 mg-padding-0">
				         <a href="#!" class="btn mg_prim_background white-text bold mg-width-100-perc">Participer gratuitement</a>
			    	</div>
			</div>
	   </div>
	</div>

	<!-- Description vne -->
	<div class="row mg-padding-top-50 mg-padding-bottom-30 mg-margin-bottom-0" style="background:url('/img/assets/home/back-tech.jpg')">
		  <div class="container">
		    <div class="col s6 "  data-aos="zoom-in-down">
				<h6 class="uppercase mg_prim_color mg-margin-left-10 bold">Virtual Network Entreprise</h6>
				<div class="divider"></div>
				<h4 class="uppercase mg_prim_color mg-padding-top-10 bold" style="clear:both;">Intégrateur de solutions informatiques</h4>
				<h5 class="uppercase mg_prim_color bold">depuis plus de 10 ans!</h5>
				<p class="mg-regular">
					Virtual Network Entreprise - Entreprise de services informatiques - a bâti un savoir-faire et une expérience incomparables, tournés au service du client.
					Notre expérience est le résultat d'un travail évolutif prenant donc en charge les problématiques actuelles et futures de l'utilisation des bénéfices apportées par l'informatisation du business d'entreprise, afin de demeurer dans une force de propostion de haut standing et d'une qualité toujours avérées, puisque nous devons aussi cette envergure à une collaboration avec des géants proactifs du secteur de l'informatique.
				</p>
			</div>
			<div class="col s6" data-aos="zoom-in-down">
				<p class="mg-regular">
					Nous sommes activement présent dans l'écosystème des technologies de l'information et de la communication ivoirien, avec de sérieux partenaires d'affaires dont les entreprises gouvernementales et organismes internationaux,des PME/PMI mais aussi des particuliers , notre politique d'ouverture se voulant la plus large et inclusive possible. Notre force de proposition comprend l'intégration des solutions informatiques, la réalisation de services de développement web &amp; mobiles , la vente d'équipements et consommables informatiques de dernière génération, ainsi que l'accueil de session de formation et de certification.A cet effect notre eventail de formation est des plus variés, sans cesse actualisés et sont effectués par des moniteurs expérimentés d'autant plus que Virtual Network Entreprise est l'un des établissement les plus select puisque nous sommes partenaire avec les 3 centres de tests les plus cotés du monde dans ce secteur, Krytérion, Prometric et enfin Pearson Vue. Avec Virtual Network Entreprise vous pouvez donc vous former et vous certifier dans le même endroit ce qui réduit considérablement les coûts.
				</p>
			</div>
		 </div>
         <!-- Business partner -->
		 	<div class="col s12 center mg-padding-top-45">
		 		<div class="container center slider-partners-business">
					<div class="grey-image center">	
						<img src="/img/assets/business-partner/partner-1.png" class="mg-width-150" alt="">
					</div>
					<div class="grey-image center">	
						<img src="/img/assets/business-partner/partner-7.png" class="mg-width-130" alt="">
					</div>
					<div class="mg-margin-top-15 grey-image center">	
						<img src="/img/assets/business-partner/partner-3.png" class="mg-width-170" alt="">
					</div>
					<div class="mg-margin-top-15 grey-image center">	
						<img src="/img/assets/business-partner/partner-4.png" class="mg-width-130" alt="">
					</div>
					<div class="mg-margin-top-10 grey-image center">	
						<img src="/img/assets/business-partner/partner-5.png" class="mg-width-150" alt="">
					</div>
					<div class="grey-image center">	
						<img src="/img/assets/business-partner/partner-6.png" class="mg-width-100" alt="">
					</div>
		 		</div>
		 	</div>
	<!-- pictogramm description vne -->
	<div class="col s12 mg-padding-top-70 mg-padding-bottom-70 mg-margin-bottom-0" >
	   <div class="container">
			<div class="col l4 m4 s12">
				<?= $this->Html->image('assets/home/action-sprite-5.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
				<span class="white-text mg_prim_color left-align bold" style="top:10px;">
					Catalogue de formation et de certification variés.
				</span>
				<p class="mg-regular mg-padding-top-25 bold" style="clear: both;">
					Nous bénéficions de nombreux experts internes ainsi que d'une collaboration avec des tiers expérimentés afin de vous proposer un riche catalogue de formation et de préparation aux diverses certifications informatiques.
				</p>
			</div>
			<div class="col l4 m4 s12">
				<?= $this->Html->image('assets/home/action-sprite-4.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
				<span class="white-text mg_prim_color left-align bold" style="top:10px;">
					Produits garantis et d'origine.
				</span>
				<p class="mg-regular mg-padding-top-20 bold" style="clear: both;">
					Notre large gamme de produits et consommables reunissent le nec plus ultra des acteurs du domaine, ajouté à une politique du prix toujours étudié, nous vous garantissons un materiel conforme.
				</p>
			</div>
			<div class="col l4 m4 s12">
				<?= $this->Html->image('assets/home/action-sprite-6.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
				<span class="white-text mg_prim_color left-align bold" style="top:10px;">
					agréés aux trois meilleurs centres de test.
				</span>
				<p class="mg-regular mg-padding-top-20 bold" style="clear: both;">
					Les multiples perspectives de certification sont aisément accomplies au travers de notre affiliation à Pearson Vue, Prometric Testing Center et Kryterion pour vous permettre de bâtir votre profil en un seul et même endroit.
				</p>
			</div>
			<div class="col s12 center mg-margin-top-20 mg-padding-0">
				<a class="btn mg_prim_background white-text bold" ng-click="homectrl.auto_scroll('solutions')">Découvrir nos solutions</a>
			</div>
	   </div>
	</div>

	</div>
</div>
<!-- End Bienvenue -->





<!-- Start Prestations -->
<div id="prestations" class="scrollspy">
	<!-- Parallax img -->
	  <div class="parallax-container pointer" ng-click="homectrl.auto_scroll('solutions')">
	      <div class="parallax">
	      	<?= $this->Html->image('assets/home/main-background-4.jpg') ?>
	        <div class="row absolute-block" style="width: 100%;top:0px;left: 15%;">
	             <div class="col l4 m12 s12">
		          <div class="card mg-margin-top-0 mg-height-800" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100%;">
		            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
		              <h5 class="card-title bold">Intégration de solution</h5>
		              <h5 class="card-title bold mg-margin-top-0">Informatiques</h5> <br>
		              <p class="mg-regular">
						Besoins d'implémentations virtuelles, cloud, locales ou tout simplement d'un univers hybride pour atteindre vos objectifs métiers ? L'intégration de solutions constitue notre principal axe de performance, et à cet effet nous sommes doté d'une équipe soucieuse de vous délivrer la prochaine innovation qui fera décoller votre business. 
		              </p>
		            </div>
		            <div class="card-action orange">
		              <a class="white-text bold pointer" ng-click="homectrl.auto_scroll('solutions')">Découvrir nos solutions</a>
		            </div>
		          </div>
	             </div>
	        </div>
	      </div>
	  </div>

	    <div class="parallax-container pointer" ng-click="homectrl.auto_scroll('trainings')">
	      <div class="parallax">
	      	<?= $this->Html->image('assets/home/wholesale-computers.jpg') ?>
	        <div class="row absolute-block" style="width: 100%;top:0px;right: -55%;">
	             <div class="col l4 m12 s12">
		          <div class="card mg-margin-top-0 mg-height-800" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100%;">
		            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
		              <h5 class="card-title bold">Formations &amp;</h5>
		              <h5 class="card-title bold mg-margin-top-0">Certifications</h5> <br>
		              <p class="mg-regular">
		              	Nos locaux proposent un cadre dédié pour les formations et le passage de vos certifications en toute simplicité ajouté à un catalogue de formation toujours plus riche, actualisé et réalisé par des moniteurs certifiés/accrédités, des labos opérationnels, votre expérience et votre appétît de découverte sera assouvi.
		              </p>

		            </div>
		            <div class="card-action orange">
		              <a class="mg_sec_color_3 bold pointer" ng-click="homectrl.auto_scroll('trainings')">Découvrir nos programmes</a>
		            </div>
		          </div>
	             </div>
	        </div>
	      </div>
	  </div>

	  <div class="parallax-container">
	      <div class="parallax">
	      	<?= $this->Html->image('assets/home/main-background-7.jpg') ?>
	        <div class="row absolute-block" style="width: 100%;top:0px;left: 15%;">
	             <div class="col l4 m12 s12">
		          <div class="card mg-margin-top-0 mg-height-800" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100%;">
		            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
		              <h5 class="card-title bold">Equipements &amp;</h5>
		              <h5 class="card-title bold mg-margin-top-0">Consommables</h5> <br>
		              <p class="mg-regular">
						Les problématiques d'acquisition du matériel informatique de qualité et garanti sont un sujet complexe pour bon nombre d'entreprises, c'est pourquoi VNE aux travers de son réseau de fournisseurs sérieux vous offres un éventail de choix afin d'opter pour la marque et les caractéristiques de votre prochain serveur d'application en toute tranquilité.  
		              </p>
		            </div>
		            <div class="card-action orange">
		              <a href="#" class="white-text bold">Demandez un devis</a>
		            </div>
		          </div>
	             </div>
	        </div>
	      </div>
	  </div>

	    <div class="parallax-container">
	      <div class="parallax">
	      	<?= $this->Html->image('assets/home/main-background-10.jpg') ?>
	        <div class="row absolute-block" style="width: 100%;top:0px;right: -55%;">
	             <div class="col l4 m12 s12">
		          <div class="card mg-margin-top-0 mg-height-800" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100%;">
		            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
		              <h5 class="card-title bold">Services</h5> <br>
		              <p class="mg-regular">
		              	Les services de Virtual Network Entreprise vous permettent de nous solliciter pour des prestations comme le développement logiciel (web/mobile/desktop) sur-mesure, les conseils en terme de déploiement d'infrastructure, l'infogérance, les prestations de maintenance, dépannage et assistance téléphone/physique en toute circonstance. 
		              </p>
		            </div>
		            <div class="card-action orange">
		              <a href="#" class="white-text bold">Demandez un devis</a>
		            </div>
		          </div>
	             </div>
	        </div>
	      </div>
	  </div>
</div>
<!-- End prestations -->


<!-- Start Solutions -->
<div id="solutions" class="scrollspy">
<!-- Solutions -->
  <div class="row center mg-padding-bottom-50 mg-padding-top-50" style="background:url('/img/assets/home/back-tech.png');">
        <div class="container">
	  		<h4 class="bold">Solutions Informatiques</h4>
	  		<p class="mg-regular mg-margin-bottom-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vel tempora eum. Accusamus velit natus assumenda ducimus fugit laborum soluta quisquam, tempora sint fuga et explicabo minus libero, voluptatem ipsa.</p>

	  		<div class="col s4">
	  			  <ul class="collapsible" data-collapsible="accordion">
				    <li ng-click="homectrl.load_solution_description(solution)" ng-repeat="solution in homectrl.solutions"> <div ng-class="homectrl.set_active_class(solution.is_active)" class="collapsible-header bold waves-effect mg_sec_color_3 left-align mg_prim_background"><img ng-src="/webroot/img/assets/pictogrammes/{{solution.solution_picto}}" width='30px' class="mg-top-8" alt="">&nbsp;{{solution.solution_label}}</div>
				    </li>
				    <li> 
				      <div class="collapsible-header bold waves-effect mg_sec_color_3 left-align mg_prim_background"><img ng-src="/webroot/img/assets/pictogrammes/more_picto.png" width='30px' class="mg-top-8" alt="">&nbsp;Voir plus</div>
				    </li>
				   	<li> 
				      <div class="collapsible-header bold waves-effect mg_sec_color_3 left-align mg_prim_background"><img ng-src="/webroot/img/assets/pictogrammes/download_picto.png" width='30px' class="mg-top-8" alt="">&nbsp;Télécharger le catalogue</div>
				    </li>

					<li ng-click="homectrl.load_solution_description('survey')"> 
				      <div class="collapsible-header bold waves-effect mg_sec_color_3 left-align mg_prim_background"><img ng-src="/webroot/img/assets/pictogrammes/call_picto.png" width='30px' class="mg-top-8" alt="">&nbsp;Assistance 24/7</div>
				    </li>
				  </ul>
	  		</div>
	  		<div class="col s8">
                  <div class="row center mg-margin-top-5" style="max-height: 590px;overflow-y: auto;overflow-x: hidden;	" id="super" ng-hide="homectrl.is_loading_solution">
                  </div>
                  <div class="progress orange" style="margin-top: 15%;" ng-show="homectrl.is_loading_solution">
                        <div class="indeterminate mg_prim_background"></div>
                   </div>
	  		</div>
        </div>
  </div>
</div>


<!-- Start Training -->
<div id="trainings" class="scrollspy">
<!-- Trainings -->
	  <div class="row center mg-padding-bottom-50 mg-padding-top-50 mg-margin-bottom-0" style="background:url('/img/assets/home/back-tech-4.jpg');">
	        <div class="container">
		  		<h4 class="bold mg_sec_color_3">Formation &amp; Certifications Informatiques</h4>
		  		<p class="mg-regular mg_sec_color_3 mg-margin-bottom-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vel tempora eum. Accusamus velit natus assumenda ducimus fugit laborum soluta quisquam, tempora sint fuga et explicabo minus libero, voluptatem ipsa.</p>

		  		<div class="col s4">
		  			  <ul class="collapsible" data-collapsible="accordion">
					    <li ng-click="homectrl.load_training_description(training)" ng-repeat="training in homectrl.trainings"> 
					      <div ng-class="homectrl.set_active_class(training.is_active)" class="collapsible-header bold waves-effect mg_sec_color_3 left-align mg_prim_background"><img ng-src="/webroot/img/assets/pictogrammes/{{training.solution_picto}}" width='30px' class="mg-top-8" alt="">&nbsp;{{training.solution_label}}</div>
					    </li>
					    <li> 
					      <div class="collapsible-header bold waves-effect mg_sec_color_3 left-align mg_prim_background"><img ng-src="/webroot/img/assets/pictogrammes/more_picto.png" width='30px' class="mg-top-8" alt="">&nbsp;Voir plus</div>
					    </li>
					   	<li> 
					      <div class="collapsible-header bold waves-effect mg_sec_color_3 left-align mg_prim_background"><img ng-src="/webroot/img/assets/pictogrammes/download_picto.png" width='30px' class="mg-top-8" alt="">&nbsp;Télécharger le catalogue</div>
					    </li>
					  </ul>
		  		</div>
		  		<div class="col s8">
	                  <div class="row center mg-margin-top-5 white-text" style="max-height: 590px;overflow-y: auto;overflow-x: hidden;	" id="super-2" ng-hide="homectrl.is_loading_solution">
	                  </div>
	                  <div class="progress orange" style="margin-top: 15%;" ng-show="homectrl.is_loading_training">
	                        <div class="indeterminate mg_sec_background_2"></div>
	                   </div>
		  		</div>
	        </div>
	  </div>
</div>


<!-- Partners -->
<div class="row center mg-margin-bottom-0 mg-padding-top-20 mg-padding-bottom-20 ng-scope" style="background: url('/img/assets/home/back-stripe-2.png')">
	<h5 class="mg-size-21 mg-main-color">Notre <span class="bold">Expertise</span> en informatique est validée par de nombreux <span class="bold">partenariats</span></h5>

	<div class="row center mg-padding-right-50 mg-padding-left-50 mg-margin-top-55 mg-padding-bottom-50">

		<div class="col s6 static-partner-container">
			<div class="col s4">
				<img src="/img/assets/partner/partner-1.png" class="mg-width-160 mg-padding-top-25" alt="">		
			</div>
			<div class="col s4 mg-padding-left-40">	
				<img src="/img/assets/partner/partner-2.png" class="mg-width-180" alt="">
			</div>
			<div class="col s4 mg-padding-left-5" style="border-right: 2px solid black;">	
				<img src="/img/assets/partner/partner-3.png" class="mg-width-90" alt="">
			</div>
		</div>
		<div class="col s6 partner-slider mg-margin-top-15">
				<div class="grey-image">	
					<img src="/img/assets/partner/partner-4.png" class="mg-width-105" alt="">
				</div>
				<div>	
					<img src="/img/assets/partner/partner-5.png" class="mg-width-120" alt="">
				</div class="grey-image">
				<div>	
					<img src="/img/assets/partner/partner-6.png" class="mg-width-130" alt="">
				</div>
				<div class="grey-image">	
					<img src="/img/assets/partner/partner-7.gif" class="mg-width-130" alt="">
				</div>
				<div class="grey-image">	
					<img src="/img/assets/partner/ec_council.png" class="mg-width-130" alt="">
				</div>
				<div class="grey-image">	
					<img src="/img/assets/partner/oracle.png" class="mg-width-130" alt="">
				</div>
				<div class="grey-image">	
					<img src="/img/assets/partner/vmware.png" class="mg-width-130" alt="">
				</div>
		</div>



	</div>

	<h6 class="mg-size-21 mg-main-color">voir tous les <span class="bold">partenaires</span></h6>
</div>


<div id="workshops" class="scrollspy">
<!-- WorkShops -->
    <div class="row center mg-padding-top-50 mg-padding-bottom-50">
	  <div class="container">
	    <h4 class="bold mg_prim_color">Ateliers de présentation</h4>
	      <p class="mg-regular mg_prim_color">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vel tempora eum. Accusamus velit natus assumenda ducimus fugit laborum soluta quisquam, tempora sint fuga et explicabo minus libero, voluptatem ipsa.</p>
	    <div class="col s12 workshop-slider">
	      <div class="workshop-item" style="border-right:5px solid white;">
	          <div class="card">
	          <div class="card-image waves-effect waves-block waves-light">
	            <img class="activator" src="webroot/img/assets/workshop/work.png">
	          </div>
	          <div class="card-content" style="min-height: 174px;">
	            <span class="card-title activator grey-text text-darken-4 mg-size-18 left-align">Netwrix Auditor ou comment réaliser un audit informatique complet<i class="ion-android-more-vertical right small"></i></span>
	            <p><a href="#" class="bold orange-text">Participer</a></p>
	          </div>
	          <div class="card-reveal orange mg_sec_color_3">
	            <span class="card-title white-text mg-size-18 left-align">Netwrix Auditor ou comment réaliser un audit informatique complet<i class="ion-minus-circled right small"></i></span>
	            <p class="left-align mg_sec_color_3 mg-regular">Here is some more information about this product that is only revealed once clicked on.</p>
	          </div>
	        </div>  
	      </div>

	      <div class="workshop-item" style="border-right:5px solid white;">
	          <div class="card">
	          <div class="card-image waves-effect waves-block waves-light">
	            <img class="activator" src="webroot/img/assets/workshop/work.png">
	          </div>
	          <div class="card-content" style="min-height: 174px;">
	            <span class="card-title activator grey-text text-darken-4 mg-size-18 left-align">Veritas NetBackup 8.0<i class="ion-android-more-vertical right small"></i></span>
	            <p><a href="#" class="bold orange-text">Participer</a></p>
	          </div>
	          <div class="card-reveal orange mg_sec_color_3">
	            <span class="card-title white-text mg-size-18 left-align">Veritas NetBackup 8.0<i class="ion-minus-circled right small"></i></span>
	            <p class="left-align mg_sec_color_3 mg-regular">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, obcaecati incidunt, consequatur deleniti sapiente quo. Libero ullam porro minima deleniti autem quibusdam quisquam neque cum, impedit deserunt commodi earum tenetur!.</p>
	          </div>
	        </div>  
	      </div>

	      <div class="workshop-item" style="border-right:5px solid white;">
	          <div class="card">
	          <div class="card-image waves-effect waves-block waves-light">
	            <img class="activator" src="webroot/img/assets/workshop/work.png">
	          </div>
	          <div class="card-content" style="min-height: 174px;">
	            <span class="card-title activator grey-text text-darken-4 mg-size-18 left-align">Présentation des produits Véritas<i class="ion-android-more-vertical right small"></i></span>
	            <p><a href="#" class="bold orange-text">Participer</a></p>
	          </div>
	          <div class="card-reveal orange mg_sec_color_3">
	            <span class="card-title white-text mg-size-18 left-align">Présentation des produits Véritas<i class="ion-minus-circled right small"></i></span>
	            <p class="left-align mg_sec_color_3 mg-regular">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, obcaecati incidunt, consequatur deleniti sapiente quo. Libero ullam porro minima deleniti autem quibusdam quisquam neque cum, impedit deserunt commodi earum tenetur!.</p>
	          </div>
	        </div>  
	      </div>

	      <div class="workshop-item" style="border-right:5px solid white;">
	          <div class="card">
	          <div class="card-image waves-effect waves-block waves-light">
	            <img class="activator" src="webroot/img/assets/workshop/work.png">
	          </div>
	          <div class="card-content" style="min-height: 174px;">
	            <span class="card-title activator grey-text text-darken-4 mg-size-18 left-align">Comment Eviter la perte/fuite de données en entreprise<i class="ion-android-more-vertical right small"></i></span>
	            <p><a href="#" class="bold orange-text">Participer</a></p>
	          </div>
	          <div class="card-reveal orange mg_sec_color_3">
	            <span class="card-title white-text mg-size-18 left-align">Comment Eviter la perte/fuite de données en entreprise<i class="ion-minus-circled right small"></i></span>
	            <p class="left-align mg_sec_color_3 mg-regular">Here is some more information about this product that is only revealed once clicked on.</p>
	          </div>
	        </div>  
	      </div>

	    </div>
	  </div>
	</div>
</div>

<!-- Maps -->
<div id="contact" class="scrollspy">
   <?= $this->element('maps') ?>
</div>

<!-- Scripts -->
<?= $this->Html->script('typing_carrousel') ?>
<?= $this->Html->script('home_stuff') ?>

