<style>
	.collapsible-header.active-item-collapsible{
		background: orange !important;
	}
	#sidenav-overlay {
    z-index: 1 !important;
}
</style>

<div ng-controller="HomeCtrl as homectrl" id="index_controller">
			<!-- Start Bienvenue smaller screen -->
			<div  class="col m12 s12 relative-block hide-on-large-only">
			     <div class="card mg-margin-top-0  mg-margin-0" style="background:url('/img/assets/home/back-tech-4.png') #ff9800 100% no-repeat;min-height:280px;">
					    <div class="card-content white-text mg-padding-top-15 mg-margin-bottom-0">
							<section>
								 <article>
									<h1 class="card-title bold">Intégrateur des solutions de demain</h1>
									    <p class="mg-weight-500 vne-description">
												Profitez de la richesse des solutions et ateliers proposés par <strong>Virtual Nertwork Entreprise</strong> afin de vous positionner éfficacement pour relever defis de l'informatique d'aujourd'hui à savoir la productivité, la sécurité et l'optimisation de la gestion de l'entièreté de votre infrastructure cloud, virtuelle et locale.
								        </p>
								 </article>
							</section>
					    </div>
						<div class="card-action mg_prim_background med-prestation-orange-banner pointer"  data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(0)">
							<span class="white-text bold pointer">En savoir plus</span>
					    </div>
			     </div>
			</div>
			<!-- Start Bienvenue Wide screen -->
			<div id="bienvenue" class="scrollspy">
				<div class="row relative-block mg_prim_background mg-margin-bottom-0">
						<div class="row absolute-block mg-width-100-perc left-align mg-padding-left-15" style="top:0px;left:0px;z-index: 100;">
					      <div class="col s12 m6 l5 hide-on-med-and-down">
					          <div class="card white-text mg-margin-top-30" style="background-color:rgba(255, 255, 255, 0.8) !important;">
					            <div class="card-content white-text">
					              <span class="card-title uppercase mg-size-46 bold mg_prim_color"><strong class="mg-weight-600">Integrateurs</strong></span> <br>
					              <span class="card-title uppercase mg-size-46 bold mg_prim_color"><strong class="mg-weight-600">de solutions</strong></span> <br>
					              <span class="txt-rotate card-title uppercase mg-size-46 bold mg_prim_color" data-period="700" data-rotate='[ "sécurisées.","performantes.", "mobiles.", "éssentielles.","pros.","innovantes."]'></span> <br>
									<section>
										<article>
					             			 <p class="mg-weight-500 black-text">Accédez à un univers de possibilités au travers des solutions et ateliers proposés par <strong>Virtual Nertwork Entreprise</strong> afin de relevez les defis de <strong>l'informatique d'aujourd'hui</strong> à savoir la productivité, la sécurité et l'optimisation de la gestion de l'entièreté de votre <strong>infrastructure cloud, virtuelle et locale.</strong></p>
										</article>
									</section>
					            </div>
					            <div class="card-action" style="border-top:2px solid orange;">
					              <span class="mg_prim_background white-text btn bold" ng-click="homectrl.auto_scroll('solutions')">Découvrir</span>
					              <span style="border:2px solid orange;" class="bold btn orange white-text" ng-click="homectrl.auto_scroll('workshops')">Ateliers</span>
					            </div>
					          </div>
					        </div>
					    </div>

					   <div class="parallax carrousel-container relative-block">
					   		    <div class="relative-block">
					               <?= $this->Html->image('assets/home/main-background-11.jpg',['style'=>'width:100%;display:block;']) ?>
					            </div>
								<div class="relative-block">
					               <?= $this->Html->image('assets/home/main-background-12.jpg',['style'=>'width:100%;display:block;']) ?>
					            </div>
					            <div class="relative-block">
					               <?= $this->Html->image('assets/home/main-background-13.jpg',['style'=>'width:100%;display:block;']) ?>
					            </div>

					   		    <div class="relative-block">
					               <?= $this->Html->image('assets/home/main-background-6.jpg',['style'=>'width:100%;display:block;']) ?>
					            </div>
					            <div class="">
					               <?= $this->Html->image('assets/home/main-background-2.jpg',['style'=>'width:100%;display:block;']) ?>
					            </div>
					    </div>
				</div>
				<!-- pictogramm description vne -->
				<div class="row mg_prim_background mg-padding-bottom-50 mg-margin-bottom-0" >
				   <div class="container">
						<div class="col l4 m4 s12 mg-padding-top-50">
							<section>
								<article>
									<?= $this->Html->image('assets/home/action-sprite-2.png',['class'=>'mg-width-60 left mg-margin-right-10','alt'=>'sprite2-vne-description']) ?>
									<h1 class="white-text relative-block left-align bold mg-size-15 mg-margin-top-0" style="top:10px;">Améliorer la productivité de votre entreprise</h1>
									<p class="mg-regular mg_sec_color_3 mg-padding-top-20" style="clear: both;">
										Besoin de plus de mobilité et d'outils permettant d'assurer une complète prise en charge de vos objectifs tout en restant dans une stratégie collaborative, autants d'arguments et de problématiques considérés et résolus par nos propositions d'intégration. 
									</p>
								</article>
							</section>
						</div>
						<div class="col l4 m4 s12 mg-padding-top-50">
							<section>
								<article>
									<?= $this->Html->image('assets/home/action-sprite-3.png',['class'=>'mg-width-60 left mg-margin-right-10','alt'=>'sprite3-vne-description']) ?>
									<h1 class="white-text relative-block left-align bold mg-margin-top-0 mg-size-15" style="top:10px;">Sécurisez votre activité numérique </h1>
									<p class="mg-regular mg_sec_color_3 mg-padding-top-20" style="clear: both;">Nécessité de vous protégez contre la perte/fuite d'information, de vous prémunir contre des attaques externes ? Nos experts après étude, conduisent pleinement toutes les phases d'intégration de la solution qui vous correspond.</p>
								</article>
							</section>

						</div>
						<div class="col l4 m4 s12 mg-padding-top-50">
							<section>
								<article>
									<?= $this->Html->image('assets/home/action-sprite-1.png',['class'=>'mg-width-60 left mg-margin-right-10','alt'=>'sprite3-vne-description']) ?>
									<h1 class="white-text relative-block left-align bold mg-margin-top-0 mg-size-15" style="top:10px;">Optimisez votre gestion</h1>
									<p class="mg-regular mg_sec_color_3 mg-padding-top-20" style="clear: both;">
									   Les nombreuses problématiques posées par la multiplicité des environnements cloud, virtuels et locaux dont la surveillance des informations et les remontées d'alerte en temps réels sont au coeur de nos préoccupations et sont clairements résolus dans nos propositions.
									</p>
								</article>
							</section>

						</div>
						<div class="col s12 center mg-margin-top-20 mg-padding-0 hide-on-med-and-down">
							<span class="btn mg-button-3 white-text bold" ng-click="homectrl.auto_scroll('solutions')">Découvrir nos solutions</span>
						</div>
				   </div>
				</div>

			<div id="poster-workshop">
				<!-- Actual Workshop (When exists) -->
				<div ng-hide="homectrl.is_poster_loading" ng-if="homectrl.hide_poster_workshop==false" class="row mg-padding-top-50 mg-padding-bottom-50 mg-margin-bottom-0" style="background:url('/img/assets/home/back-tech-4.png') #C1872A no-repeat;">
				   <div class="container">
				   	     <!-- Description for med and wider screens -->
					    <div class="col l6 m6 s12 hide-on-small-only"  data-aos="zoom-in-down">
							<h6 class="uppercase mg-margin-left-10 white-text bold">Atelier à l'affiche</h6>
							<div class="divider"></div>
							<h4 class="uppercase mg-padding-top-10 bold white-text" style="clear:both;">{{homectrl.poster.workshop_theme}}</h4>

							<h5 class="mg-padding-top-10 bold white-text" style="clear:both;">{{homectrl.poster.workshop_begin | date:'dd '}} {{homectrl.poster.ref_month_full}} {{homectrl.poster.workshop_begin | date:'yyyy - HH:mm'}}  </h5>
							<p class="mg-regular white-text">
								{{homectrl.poster.first_part_description}}
							</p>
						</div>
						<div class="col l6 m6 s12 hide-on-small-only" data-aos="zoom-in-down">
							<p class="mg-regular white-text">
								{{homectrl.poster.second_part_description}}
							</p>
						    	<div class="col s12 mg-padding-0">
							         <a href="{{homectrl.poster.workshop_form_link}}" target="_blank" class="btn mg-button-1 bold mg-width-100-perc">Participer gratuitement</a>
						    	</div>
						</div>
						<!-- Description for smaller screens -->
						<div class="col s12 hide-on-med-and-up">
							<h6 class="uppercase mg-margin-left-10 white-text bold">Atelier à l'affiche</h6>
							<div class="divider"></div>
							<h4 class="uppercase mg-padding-top-10 bold white-text" style="clear:both;">{{homectrl.poster.workshop_theme}}</h4>
							<h5 class="mg-padding-top-10 bold white-text" style="clear:both;">{{homectrl.poster.workshop_begin | date:'dd '}} {{homectrl.poster.ref_month_full}} {{homectrl.poster.workshop_begin | date:'yyyy - HH:mm'}}  </h5>

							<p class="mg-regular white-text">
								{{homectrl.poster.workshop_long_description}}
							</p>
						    	<div class="col s12 mg-padding-0">
							         <a href="{{homectrl.poster.workshop_form_link}}" target="_blank" class="btn mg-button-1 bold mg-width-100-perc">Participer gratuitement</a>
						    	</div>
						</div>
				   </div>
				</div>
				<!-- When Workshop Doesn't exist -->
				<div ng-hide="homectrl.is_poster_loading" ng-if="homectrl.hide_poster_workshop==true" class="row mg-padding-top-50 mg-padding-bottom-50 mg-margin-bottom-0" style="background:url('/img/assets/home/back-tech-4.png') #C1872A no-repeat;">
				   <div class="container">
				   	    <div class="container">
						    <div class="col l12 m12 s12 mg-padding-0"  data-aos="zoom-in-down">
								<h1 class="uppercase mg-margin-left-10 white-text bold mg-size-20">Atelier à l'affiche</h1>
								<div class="divider"></div>
								<h2 class="uppercase mg-padding-top-10 bold white-text mg-size-25" style="clear:both;">Aucun atelier à l'affiche</h2>
								<div class="col s12 mg-padding-0 mg-margin-top-10">
								   <a href="#workshops" class="btn mg-button-1 bold mg-width-100-perc">Voir les ateliers</a>
							   </div>
							</div>
				   	    </div>
				   </div>
				</div>

				<!-- Preloader Poster -->
				 <div class="progress orange"  ng-show="homectrl.is_poster_loading">
				        <div class="indeterminate mg_prim_background"></div>
				   </div>
			</div>


			<!-- Description vne -->
			<div class="row mg-padding-top-50 mg-padding-bottom-70 mg-margin-bottom-0" style="background:url('/img/assets/home/back-tech.jpg')">
					  <div class="container">
					    <div class="col l6 m6 s12"  data-aos="zoom-in-down">
					    	<section>
					    		<article>
									<h1 class="uppercase mg_prim_color bold mg-size-20 mg-margin-left-0 mg-margin-top-0 mg-margin-bottom-5">Virtual Network Entreprise</h1>
									<div class="divider"></div>
									<h2 class="uppercase mg_prim_color mg-padding-top-10 bold mg-size-35 mg-margin-left-0 mg-margin-top-5" style="clear:both;">Intégrateur de solutions informatiques</h2>
									<h3 class="uppercase mg_prim_color bold mg-size-20 mg-margin-left-0 mg-margin-top-5"><mark>depuis plus de 10 ans!</mark></h3>
									<p class="mg-regular mg-margin-bottom-0">
										Virtual Network Entreprise - Entreprise de services informatiques - a bâti un savoir-faire et une expérience incomparables, tournés au service du client.
										Notre expérience est le résultat d'un travail évolutif prenant donc en charge les problématiques actuelles et futures de l'utilisation des bénéfices apportées par l'informatisation du business d'entreprise, afin de demeurer dans une force de propostion de haut standing et d'une qualité toujours avérées, puisque nous devons aussi cette envergure à une collaboration avec des géants proactifs du secteur de l'informatique.
									</p>
					    		</article>
					    	</section>
						</div>
						<div class="col l6 m6 s12" data-aos="zoom-in-down">
							<section>
								<article>
									<p class="mg-regular">
										Nous sommes activement présent dans l'écosystème des technologies de l'information et de la communication ivoirien, avec de sérieux partenaires d'affaires dont les entreprises gouvernementales et organismes internationaux,des PME/PMI mais aussi des particuliers , notre politique d'ouverture se voulant la plus large et inclusive possible. Notre force de proposition comprend l'intégration des solutions informatiques, la réalisation de services de développement web &amp; mobiles , la vente d'équipements et consommables informatiques de dernière génération, ainsi que l'accueil de session de formation et de certification.A cet effect notre eventail de formation est des plus variés, sans cesse actualisés et sont effectués par des moniteurs expérimentés d'autant plus que Virtual Network Entreprise est l'un des établissement les plus select puisque nous sommes partenaire avec les 3 centres de tests les plus cotés du monde dans ce secteur, Krytérion, Prometric et enfin Pearson Vue. Avec Virtual Network Entreprise vous pouvez donc vous former et vous certifier dans le même endroit ce qui réduit considérablement les coûts.
									</p>
								</article>
							</section>
						</div>
					 </div>

			    <!-- Business Partner -->
			    <div class="col l12 m12 s12 center mg-padding-top-45">
					 		<div class="container center slider-partners-business">
								<div class="mg-margin-top-15 grey-image center">	
									<a href="http://www.bridgebankgroup.com" target="_blank">
									  <img src="/img/assets/business-partner/partner-3.png" class="mg-width-160" alt="">
									</a>
								</div>

								<div class="grey-image center">
									<a href="http://www.fdfp.ci" target="_blank">
							          <img src="/img/assets/business-partner/partner-4.png" class="mg-width-150" alt="">
									</a>
								</div>

								<div class="grey-image center">	
									<a href="http://www.sahamassurance.com" target="_blank">
							           <img src="/img/assets/business-partner/partner-5.png" class="mg-width-160" alt="">
									</a>
								</div>

								<div class="grey-image center">	
									<a href="http://www.sunu-group.com/" target="_blank">
									   <img src="/img/assets/business-partner/partner-6.png" class="mg-width-100" alt="">
									</a>
								</div>

								<div class="grey-image center">	
									<a href="http://www.cnps.ci" target="_blank">
									   <img src="/img/assets/business-partner/partner-1.png" class="mg-width-150" alt="">
									</a>
								</div>

								<div class="grey-image center">	
									<a href="http://www.unacoopec.com" target="_blank">
									   <img src="/img/assets/business-partner/partner-7.png" class="mg-width-130" alt="">
									</a>
								</div>					
					 		</div>
			      </div>


				<!-- pictogramm description vne -->
				<div class="col s12 mg-padding-top-40 mg-margin-bottom-0">
				   <div class="container">
						<div class="col l4 m4 s12 mg-padding-top-30">
							<section>
								<article>
									<?= $this->Html->image('assets/home/action-sprite-5.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
									<h1 class="white-text mg_prim_color left-align bold mg-size-15 mg-margin-top-0" style="top:10px;">
										Catalogue de formation et de certification variés.
									</h1>
									<p class="mg-regular mg-padding-top-25" style="clear: both;">
										Nous bénéficions de nombreux experts internes ainsi que d'une collaboration avec des tiers expérimentés afin de vous proposer un riche catalogue de formation et de préparation aux diverses certifications informatiques.
									</p>
								</article>
							</section>

						</div>
						<div class="col l4 m4 s12 mg-padding-top-30">
							<section>
								<article>
									<?= $this->Html->image('assets/home/action-sprite-4.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
									<span class="white-text mg_prim_color left-align bold mg-size-15 mg-margin-top-0" style="top:10px;">
										Produits garantis et d'origine.
									</span>
									<p class="mg-regular mg-padding-top-20" style="clear: both;">
										Notre large gamme de produits et consommables reunissent le nec plus ultra des acteurs du domaine, ajouté à une politique du prix toujours étudié, nous vous garantissons un materiel conforme.
									</p>
								</article>
							</section>
						</div>
						<div class="col l4 m4 s12 mg-padding-top-30">
							<section>
								<article>
									<?= $this->Html->image('assets/home/action-sprite-6.png',['class'=>'mg-width-60 left mg-margin-right-10']) ?>
									<h1 class="white-text mg_prim_color left-align bold mg-size-15 mg-margin-top-0" style="top:10px;">
										agréés aux trois meilleurs centres de test.
									</h1>
									<p class="mg-regular mg-padding-top-20" style="clear: both;">
										Les multiples perspectives de certification sont aisément accomplies au travers de notre affiliation à Pearson Vue, Prometric Testing Center et Kryterion pour vous permettre de bâtir votre profil en un seul et même endroit.
									</p>
								</article>
							</section>

						</div>
						<div class="col s12 center mg-margin-top-20 mg-padding-0 hide-on-med-and-down">
							<span class="btn mg_prim_background white-text bold" ng-click="homectrl.auto_scroll('solutions')">Découvrir nos solutions</span>
						</div>
				   </div>
				</div>

				</div>
			</div>
			<!-- End Bienvenue -->

			<div  id="prestations" class="scrollspy">
				<!-- Start Prestations (For large screen only)-->
				<div class="hide-on-med-and-down">
					<!-- Parallax img -->
					  <div class="parallax-container pointer" ng-click="homectrl.auto_scroll('solutions')">
					      <div class="parallax">
					      	<?= $this->Html->image('assets/home/main-background-4.jpg') ?>
					        <div class="row absolute-block" style="width: 100%;top:0px;left: 15%;">
					             <div class="col l4 m12 s12">
						          <div class="card mg-margin-top-0 mg-height-800" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100%;">
						            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
						              <article>
						              	<section>
							              <h1 class="card-title bold mg-size-24 mg-margin-top-0">Intégration de solution</h1>
							              <h1 class="card-title bold mg-margin-top-0 mg-size-24 mg-margin-bottom-0">Informatiques</h1> <br>
							              <p class="mg-regular">
											Besoins d'implémentations virtuelles, cloud, locales ou tout simplement d'un univers hybride pour atteindre vos objectifs métiers ? L'intégration de solutions constitue notre principal axe de performance, et à cet effet nous sommes doté d'une équipe soucieuse de vous délivrer la prochaine innovation qui fera décoller votre business. 
							              </p>
						              	</section>
						              </article>
						            </div>
						            <div class="card-action orange">
						              <span class="white-text bold pointer" ng-click="homectrl.auto_scroll('solutions')">Découvrir nos solutions</span>
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
						            	<section>
						            		<article>
									              <h1 class="card-title bold mg-size-24 mg-margin-top-0">Formations &amp;</h1>
									              <h1 class="card-title bold mg-margin-top-0 mg-size-24 mg-margin-bottom-0">Certifications</h1> <br>
									              <p class="mg-regular">
									              	Nos locaux proposent un cadre dédié pour les formations et le passage de vos certifications en toute simplicité ajouté à un catalogue de formation toujours plus riche, actualisé et réalisé par des moniteurs certifiés/accrédités, des labos opérationnels, votre expérience et votre appétît de découverte sera assouvi.
									              </p>
						            		</article>
						            	</section>


						            </div>
						            <div class="card-action orange">
						              <span class="mg_sec_color_3 bold pointer" ng-click="homectrl.auto_scroll('trainings')">Découvrir nos programmes</span>
						            </div>
						          </div>
					             </div>
					        </div>
					      </div>
					  </div>

					  <div class="parallax-container pointer" data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(3)">
					      <div class="parallax">
					      	<?= $this->Html->image('assets/home/main-background-7.jpg') ?>
					        <div class="row absolute-block" style="width: 100%;top:0px;left: 15%;">
					             <div class="col l4 m12 s12">
						          <div class="card mg-margin-top-0 mg-height-800" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100%;">
						            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
						            	<section>
						            		<article>
									              <h1 class="card-title bold mg-size-24 mg-margin-top-0">Equipements &amp;</h1>
									              <h1 class="card-title bold mg-margin-top-0 mg-size-24 mg-margin-bottom-0">Consommables</h1> <br>
									              <p class="mg-regular">
													Les problématiques d'acquisition du matériel informatique de qualité et garanti sont un sujet complexe pour bon nombre d'entreprises, c'est pourquoi VNE aux travers de son réseau de fournisseurs sérieux vous offres un éventail de choix afin d'opter pour la marque et les caractéristiques de votre prochain serveur d'application en toute tranquilité.  
									              </p>
						            		</article>
						            	</section>
						            </div>
						            <div class="card-action orange">
						              <span href="#" class="white-text bold">Demandez une cotation</span>
						            </div>
						          </div>
					             </div>
					        </div>
					      </div>
					  </div>

					    <div class="parallax-container pointer" data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(4)">
					      <div class="parallax">
					      	<?= $this->Html->image('assets/home/main-background-10.jpg') ?>
					        <div class="row absolute-block" style="width: 100%;top:0px;right: -55%;">
					             <div class="col l4 m12 s12">
						          <div class="card mg-margin-top-0 mg-height-800" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100%;">
						            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
						            	<section>
						            		<article>
								              <h1 class="card-title bold mg-size-24 mg-margin-top-0">Services</h1> <br>
								              <p class="mg-regular">
								              	Les services de Virtual Network Entreprise vous permettent de nous solliciter pour des prestations comme le développement logiciel (web/mobile/desktop) sur-mesure, les conseils en terme de déploiement d'infrastructure, l'infogérance, les prestations de maintenance, dépannage et assistance téléphone/physique en toute circonstance. 
								              </p>
						            		</article>
						            	</section>
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

				<!-- Start Prestations (For med screen only)-->
				<div class="hide-on-large-only hide-on-small-only">
					   <!-- Parallax img -->
					             <div class="col m12 s12 relative-block" style="overflow: hidden;">
						             	<?= $this->Html->image('assets/home/main-background-4.jpg',['style'=>'width:100%;display:block;']) ?>
							          <div class="card mg-margin-top-0 mg-height-400 absolute-block" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100% no-repeat;top: 0px;width: 50%;min-height: 600px;">
							            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
							              <section>
							              	<article>
								              <h1 class="card-title bold mg-size-24 mg-margin-top-0">Intégration de solutions Informatiques</h1>
								              <p class="mg-regular">
												Besoins d'implémentations virtuelles, cloud, locales ou tout simplement d'un univers hybride pour atteindre vos objectifs métiers ? Nous sommes doté d'une équipe soucieuse de vous délivrer la prochaine innovation qui fera décoller votre business. 
								              </p>
							              	</article>
							              </section>

							            </div>
							            <div class="card-action orange med-prestation-orange-banner pointer" data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(0)">
							              <span class="white-text bold pointer" >En savoir plus</span>
							            </div>
							          </div>
							          				          <!-- Button floating -->
								        <button data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(0)" class="absolute-block btn bold btn-large med-prestation-side-button mg-button-1 hide" style="right: 10%;top: 50%;width: 25%;">Devis</button>
					             </div>


					             <div class="col m12 s12 relative-block" style="overflow: hidden;">
						             	<?= $this->Html->image('assets/home/wholesale-computers.jpg',['style'=>'width:100%;display:block;']) ?>
							          <div class="card mg-margin-top-0 mg-height-400 absolute-block" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100% no-repeat;top: 0px;right:0px;width: 50%;min-height: 600px;">
								            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
								            	<section>
								            		<article>
														  <h1 class="card-title bold mg-size-24 mg-margin-top-0">Formations &amp;</h1>
											              <h1 class="card-title bold mg-margin-top-0 mg-size-24">Certifications</h1>
											              <p class="mg-regular">
											              	Nos locaux proposent un cadre dédié pour les formations et le passage de vos certifications en toute simplicité ajouté à un catalogue de formation toujours plus riche, actualisé et réalisé par des moniteurs certifiés/accrédités, des labos opérationnels.
											              </p>
								            		</article>
								            	</section>
								            </div>
								            <div class="card-action orange med-prestation-orange-banner pointer" data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(1)">
								              <span class="white-text bold pointer">En savoir plus</span>
								            </div>
							          </div>
							          				          <!-- Button floating -->
								       <button data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(1)" class="absolute-block btn bold btn-large med-prestation-side-button mg-button-1 hide" style="left: 10%;top: 50%;width: 25%;">Devis</button>
					             </div>

					            <div class="col m12 s12 relative-block" style="overflow: hidden;">
						             	<?= $this->Html->image('assets/home/main-background-7.jpg',['style'=>'width:100%;display:block;']) ?>
						             	   <!-- Cards -->
								          <div class="card mg-margin-top-0 mg-height-400 absolute-block" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100% no-repeat;top: 0px;width: 50%;min-height: 600px;">
									            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
									            	<section>
									            		<article>
												              <h1 class="card-title bold mg-margin-top-0">Equipements &amp;</h1>
												              <h1 class="card-title bold mg-margin-top-0">Consommables</h1>
												              <p class="mg-regular">
																Les problématiques d'acquisition du matériel informatique de qualité et garanti sont un sujet complexe pour bon nombre d'entreprises, c'est pourquoi VNE aux travers de son réseau de fournisseurs sérieux vous offres un éventail de choix.
												              </p>
									            		</article>
									            	</section>
									            </div>
									            <div class="card-action orange med-prestation-orange-banner pointer" data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(3)">
									              <span class="white-text bold pointer" >En savoir plus</span>
									            </div>
								          </div>
								          <!-- Button floating -->
								          <button data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(3)" class="absolute-block btn bold btn-large med-prestation-side-button mg-button-1 hide" style="right: 10%;top: 50%;width: 25%;">Devis</button>
					             </div>

					        	<div class="col m12 s12 relative-block" style="overflow: hidden;">
						             	<?= $this->Html->image('assets/home/main-background-10.jpg',['style'=>'width:100%;display:block;']) ?>
							          <div class="card mg-margin-top-0 mg-height-400 absolute-block" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100% no-repeat;top: 0px;right:0px;width: 50%;min-height: 600px;">
								            <div class="card-content white-text mg-padding-top-30 mg-margin-bottom-20">
								            	<section>
								            		<article>
								            			  <h1 class="card-title bold mg-margin-top-0 mg-size-24">Services</h1>
											              <p class="mg-regular">
											              	Les services de Virtual Network Entreprise vous permettent de nous solliciter pour des prestations comme le développement logiciel (web/mobile/desktop) sur-mesure, les conseils en terme de déploiement d'infrastructure, l'infogérance, les prestations de maintenance, dépannage et assistance téléphone/physique en toute circonstance. 
											              </p>
								            		</article>
								            	</section>
								            </div>
								         <div class="card-action orange med-prestation-orange-banner pointer"  data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(4)">
							              <span class="white-text bold pointer">En savoir plus</span>
							            </div>
							          </div>
							          <!-- Button floating -->
								       <button data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(4)" class="absolute-block btn bold btn-large med-prestation-side-button mg-button-1 hide" style="left: 10%;top: 45%;width: 25%;">Devis</button>
					             </div>
				</div>
				<!-- End prestations -->

				<!-- Start Prestations (For smaller screen only)-->
				<div class="hide-on-med-and-up">
					   <!-- Parallax img -->
					             <div class="col m12 s12 relative-block">
							          <div class="card mg-margin-top-0  mg-margin-0" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100% no-repeat;min-height: 250px;">
							            <div class="card-content white-text mg-padding-top-15 mg-margin-bottom-0">
							            	<section>
							            		<article>
										              <h1 class="card-title bold mg-size-24">Intégration de solutions Informatiques</h1>
										              <p class="mg-regular">
														Besoins d'implémentations virtuelles, cloud, locales ou tout simplement d'un univers hybride pour atteindre vos objectifs métiers ? Nous sommes doté d'une équipe soucieuse de vous délivrer la prochaine innovation qui fera décoller votre business. 
										              </p>
							            		</article>
							            	</section>
							            </div>
							          </div>
							         <?= $this->Html->image('assets/home/main-background-4.jpg',['style'=>'width:100%;display:block;']) ?>
							         			          				          <!-- Button floating -->
								      <button data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(0)" class="absolute-block btn bold btn-large med-prestation-side-button mg-button-1 hide" style="right: 10%;top: 70%;width: 80%;">Plus d'infos</button>
					             </div>


					            <div class="col m12 s12 relative-block">
							          <div class="card mg-margin-top-0 mg-margin-0" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100% no-repeat;min-height: 250px;">
								            <div class="card-content white-text mg-padding-top-15 mg-margin-bottom-0">
								              <section>
								              	<article>
									              <h1 class="card-title bold mg-size-24">Formations &amp;</h1>
									              <h1 class="card-title bold mg-margin-top-0 mg-size-24">Certifications</h1>
									              <p class="mg-regular">
									              	Nos locaux proposent un cadre dédié pour les formations et le passage de vos certifications en toute simplicité ajouté à un catalogue de formation toujours plus riche, actualisé et réalisé par des moniteurs certifiés/accrédités, des labos opérationnels.
									              </p>
								              	</article>
								              </section>
								            </div>
							          </div>
						             	<?= $this->Html->image('assets/home/wholesale-computers.jpg',['style'=>'width:100%;display:block;']) ?>
						             				         			          				          <!-- Button floating -->
								          <button data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(1)" class="absolute-block btn bold btn-large med-prestation-side-button mg-button-1 hide" style="left: 10%;top: 70%;width: 80%;">Plus d'infos</button>
					             </div>


					            <div class="col m12 s12 relative-block">
							          <div class="card mg-margin-top-0 mg-margin-0" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100% no-repeat;min-height: 250px;">
									            <div class="card-content white-text mg-padding-top-15 mg-margin-bottom-0">
									            	<section>
									            		<article>
											              <h1 class="card-title bold mg-margin-top-10 mg-size-24">Equipements &amp;</h5>
											              <h1 class="card-title bold mg-size-24 mg-margin-top-0">Consommables</h5>
											              <p class="mg-regular">
															Les problématiques d'acquisition du matériel informatique de qualité et garanti sont un sujet complexe pour bon nombre d'entreprises, c'est pourquoi VNE aux travers de son réseau de fournisseurs sérieux vous offres un éventail de choix.
											              </p>
									            		</article>
									            	</section>
									            </div>
							          </div>
						             	<?= $this->Html->image('assets/home/main-background-7.jpg',['style'=>'width:100%;display:block;']) ?>
						             	<button data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(3)" class="absolute-block btn bold btn-large med-prestation-side-button mg-button-1 hide" style="right: 10%;top: 70%;width: 80%;">Plus d'infos</button>
					             </div>


					            <div class="col m12 s12 relative-block">
							          <div class="card mg-margin-top-0 mg-margin-0" style="background:url('/img/assets/home/back-tech-2.png') #3c6484 100% no-repeat;min-height: 250px;">
								            <div class="card-content white-text mg-padding-top-15 mg-margin-bottom-0">
								            	<section>
								            		<article>
										              <h1 class="card-title bold mg-size-24">Services</h1>
										              <p class="mg-regular">
										              	Les services de Virtual Network Entreprise vous permettent de nous solliciter pour des prestations comme le développement logiciel (web/mobile/desktop) sur-mesure, les conseils en terme de déploiement d'infrastructure, l'infogérance, les prestations de maintenance, dépannage et assistance téléphone/physique en toute circonstance. 
										              </p>
								            		</article>
								            	</section>
								            </div>
							           </div>
						               <?= $this->Html->image('assets/home/main-background-10.jpg',['style'=>'width:100%;display:block;']) ?>
						               <button data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(4)" class="absolute-block btn bold btn-large med-prestation-side-button mg-button-1 hide" style="left: 10%;top: 70%;width: 80%;">Plus d'infos</button>
					             </div>
				</div>
				<!-- End prestations -->
			</div>


			<!-- Start Solutions -->
			<div  id="solutions" class="scrollspy hide-on-med-and-down">
			<!-- Solutions -->
			  <div class="row center mg-padding-bottom-70 mg-margin-bottom-0 mg-padding-top-50" style="background:url('/img/assets/home/back-tech.png');">
			        <div class="container">
				  		<h4 class="bold">Solutions Informatiques</h4>
				  		<p class="mg-regular mg-weight-600 mg-margin-bottom-40">
				  			L'evolution exponentielle de l'environnement des technologies de l'information et de la communication, nous permet sans cesse de vous proposer le meilleur des solutions à succès mais aussi celles qui sont entrain de monter en puissance et en performance, toujours dans un souci d'amélioration de votre productivité et de gestion de votre business, <a data-target="quoteModal" dismissible="false" modal ng-click="homectrl.change_solution_type(0)" class="pointer">demandez une cotation.</a></p>
					  		<div class="col s4">
					  			  <ul class="collapsible" data-collapsible="accordion">
								    <li ng-click="homectrl.load_solution_description(solution)" ng-repeat="solution in homectrl.solutions"> 
								    	<div ng-class="homectrl.set_active_class(solution.is_active)" class="collapsible-header bold waves-effect mg_sec_color_3 left-align mg_prim_background">
								    		 <img ng-src="/webroot/img/assets/pictogrammes/{{solution.solution_picto}}" width='30px' class="mg-top-8" alt="">&nbsp;{{solution.solution_label}}
								    	</div>
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
				                  <div class="progress orange" style="margin-top: 50%;" ng-show="homectrl.is_loading_solution">
				                        <div class="indeterminate mg_prim_background"></div>
				                   </div>
					  		</div>
			        </div>
			  </div>
			</div>


			<!-- Start Training -->
			<div  id="trainings" class="scrollspy hide-on-med-and-down">
			<!-- Trainings -->
				  <div class="row center mg-padding-bottom-50 mg-padding-top-50 mg-margin-bottom-0" style="background:url('/img/assets/home/back-tech-4.jpg');">
				        <div class="container">
					  		<h4 class="bold mg_sec_color_3">Formation &amp; Certifications Informatiques</h4>
					  		<p class="mg-regular mg-weight-600 mg_sec_color_3 mg-margin-bottom-40">Besoin de donner à votre carrirère informatique une touche de renouveau ou beaucoup plus de valeur? VNE est le cadre idéal pour remplir vos ambitions de formation avec un catalogue riche, des salles spécialisées et des moniteurs expérimentés, une seule chose à faire, <a modal data-target="quoteModal" dismissible="false" class="orange-text pointer" ng-click="homectrl.change_solution_type(1)">demandez une cotation-formation</a> et nous vous recontactons au plus vite!</p>

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
				                  <div id="super-2" ng-hide="homectrl.is_loading_training" class="row center mg-margin-top-5 white-text" style="max-height: 590px;overflow-y: auto;overflow-x: hidden;" >
				                  </div>
				                  <div class="progress orange" style="margin-top: 40%;" ng-show="homectrl.is_loading_training">
				                        <div class="indeterminate mg_sec_background_3"></div>
				                   </div>
					  		</div>
				        </div>
				  </div>
			</div>


			<!-- Partners for med and up screens -->
			<div  class="row center mg-margin-bottom-0 mg-padding-top-20 mg-padding-bottom-20 ng-scope hide-on-med-and-down" style="background: url('/img/assets/home/back-stripe-2.png')">
				<h5 class="mg-size-21 mg-main-color">Notre <span class="bold">Expertise</span> en informatique est validée par de nombreux <span class="bold">partenariats</span></h5>

				<div class="row center mg-padding-right-50 mg-padding-left-50 mg-margin-top-55 mg-padding-bottom-50">
					<div class="col s6 static-partner-container">
						<div class="col l4 m4 s12">
							<a href="https://www.kryteriononline.com/Locate-Test-Center" target="_blank">
							   <img src="/img/assets/partner/partner-1.png" class="mg-width-160 mg-padding-top-25" alt="">
							</a>
						</div>
						<div class="col l4 m4 s12 mg-padding-left-40">	
							<a href="https://www.prometric.com/" target="_blank">
							  <img src="/img/assets/partner/partner-2.png" class="mg-width-180" alt="">
							</a>
						</div>
						<div class="col l4 m4 s12 mg-padding-left-5" style="border-right: 2px solid black;">	
							<a href="https://home.pearsonvue.com" target="_blank">
							   <img src="/img/assets/partner/partner-3.png" class="mg-width-90" alt="">
							</a>
						</div>
					</div>
					<div class="col s6 partner-slider mg-margin-top-15">
							<div class="grey-image">	
								<a href="https://www.cisco.com/c/fr_fr/index.html" target="_blank">
								  <img src="/img/assets/partner/partner-4.png" class="mg-width-105" alt="">
							    </a>
							</div>
							<div class="grey-image mg-margin-top-5">	
								<a href="https://www.veritas.com/fr/fr" target="_blank">
								  <img src="/img/assets/partner/partner-5.png" class="mg-width-120" alt="">
								</a>
							</div >
							<div class="grey-image mg-margin-top-5">
								<a href="https://www.microsoft.com/fr-fr" target="_blank">
								  <img src="/img/assets/partner/partner-6.png" class="mg-width-130" alt="">
								</a>
							</div>
							<div class="grey-image">	
							    <a href="https://www.fortinet.com" target="_blank">
								   <img src="/img/assets/partner/partner-7.gif" class="mg-width-140" alt="">
								</a>
							</div>
							<div class="grey-image mg-margin-top-8">
							  <a href="https://www.eccouncil.org" target="_blank">
								<img src="/img/assets/partner/ec_council.png" class="mg-width-130" alt="">
							  </a>	
							</div>
							<div class="grey-image">
							  <a href="https://www.oracle.com/fr/index.html" target="_blank">
								<img src="/img/assets/partner/oracle.png" class="mg-width-130" alt="">
							  </a>	
							</div>
							<div class="grey-image">
							  <a href="https://www.vmware.com/fr.html
			" target="_blank">
								<img src="/img/assets/partner/vmware.png" class="mg-width-130" alt="">
							  </a>	
							</div>
					    </div>
				     </div>
				<h6 class="mg-size-21 mg-main-color">voir tous les <span class="bold">partenaires</span></h6>
			</div>

			<div  id="workshops" class="scrollspy">
			<!-- WorkShops -->
			    <div class="row center mg-padding-top-50 mg-padding-bottom-50" style="background: url('/img/assets/home/back-tech-5.png') #fff no-repeat;">
				  <div class="container">
				    <h4 class="bold mg_prim_color">Ateliers de présentation</h4>
				      <p class="mg-semi mg_prim_color">Les ateliers de présentation permettent de découvrir les diverses innovations technologiques que nos partenaires mettent à votre disposition afin d'améliorer la productivité et la gestion de votre business. Les ateliers sont présentés au sein de VNE, par des entités actives qui justifient d'une expertise sur ladite solution et reunissent plusieurs responsables informatiques. Veuillez vous référer à la section  atelier à l'affiche pour <span ng-click="homectrl.auto_scroll('poster-workshop')" class="orange-text pointer">vous inscrire gratuitement au prochain atelier</span>.</p>
				    <div class="col s12 workshop-slider mg-margin-top-20">
			                <div on-finish-render="ngRepeatFinished" ng-repeat="w in homectrl.workshops" class="workshop-item" style="border-right:5px solid white;">
			                   <div class="card">
			                       <div class="card-image waves-effect waves-block waves-light">
			                         <img class="activator" src="webroot/img/assets/workshop/work.png">
			                       </div>
			                       <div class="card-content" style="min-height: 174px;">
			                         <span class="card-title activator grey-text text-darken-4 mg-size-18 left-align">{{w.workshop_theme}}<i class="ion-android-more-vertical right small"></i></span>
			                       </div>
			                       <div class="card-reveal orange mg_sec_color_3">
			                         <span class="card-title white-text mg-size-18 left-align">
			                         	{{w.workshop_theme}}
			                         	<i class="ion-minus-circled right small"></i></span>
			                         	<h6 class="white-text left-align mg-size-17">{{w.workshop_begin | date:'dd'}} {{w.ref_month_full}} {{w.workshop_begin | date:'yyyy - HH:mm'}}</h6>
			                         <p class="left-align mg_sec_color_3 mg-regular">
			                         	{{w.workshop_short_description}}
			                         </p>
			                       </div>
			                    </div>  
			               </div>

				    </div>

				  </div>
				</div>
			</div>
			<!-- Maps -->
			<div  id="contact" class="scrollspy">
			   <?= $this->element('maps') ?>
			</div>
			<!-- Quote -->
			<?= $this->element('Modals/quote') ?>
			<!-- Newsletter Banner -->
			<?= $this->element('Modals/newsletter') ?>
			<!-- Robot Message -->
			<?= $this->element('Modals/message_robot') ?>
</div>

<!-- Script -->
<?= $this->Html->script('typing_carrousel') ?>
<?= $this->Html->script('home_stuff') ?>
