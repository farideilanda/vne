<style>
	.input-field input.ng-invalid{
		border:2px solid orange !important;
	}

	.input-field input.ng-valid{
		border:2px solid #f3f3f3 !important;
	}

  .switch label input[type=checkbox]:checked+.lever:after {
    background-color: orange !important;
   }
</style>

<!-- Modal Structure -->
<div id="quoteModal" class="modal">
	<!-- Modal content -->
    <div class="modal-content mg-padding-0 relative-block" style="background:url('/img/assets/home/back-tech-2.png') 100% no-repeat;">
		<!-- Preloader -->
		<div class="row mg-margin-0 absolute-block" ng-show="homectrl.sending_quote" style="background-color: rgba(0, 0, 0, 0.62);height: 100%;width: 100%;z-index: 1;">
			<div class="col s12 relative-block center" style="margin-top:250px;">
				 <p class="white-text">Envoi en cours</p>
	             <div class="progress orange fixed-block" >
	                  <div class="indeterminate white"></div>
	             </div>
			</div>
		</div>
		<!-- Form Content -->
        <h6 class="white-text orange mg-margin-0 mg-padding-10 bold">
          <span>Demande de cotation</span>
          <i class="right ion-close-circled mg-size-20" ng-click="homectrl.closeModalQuote()"></i>
        </h6> 	
		<div class="container">
			<div class="container">

	         <form name="quote_ask_form" ng-submit="homectrl.submit_quote(homectrl.quote)">
			         	<!-- Quote Type -->
			         	<div class="col s12 input-field">
			         		<h6 class="bold mg_prim_color">Sélectionner le type de cotation</h6>
			         		<select class="browser-default" required ng-model="homectrl.quote.type" id="type-select" ng-options="t.type_label for t in homectrl.types_quote"></select>
			         	</div>
						<!-- Solution items -->
			         	<div class="col s12 input-field">
			         		<h6 class="bold mg_prim_color">Sélectionner un item</h6>
			         		<select class="browser-default" required ng-model="homectrl.quote.solution" id="solution-select" ng-options="t.solution_label for t in homectrl.solutions_quote | filter: homectrl.evalute_solution_item['function']"></select>
			         	</div>

			         	<!-- Subscriber  fullname-->
						<div class="col s12 input-field">
							<h6 class="bold mg_prim_color">Nom Complet</h6>
							<input required type="text" class="browser-default mg-height-45 mg-width-100-perc" required ng-minlength="5" ng-maxlength="100" name="subscriber_fullname" ng-model="homectrl.quote.quote_subscriber_fullname">
						</div>
							
					   <!-- Subscriber  email-->
						<div class="col s12 input-field">
							<h6 class="bold mg_prim_color">Email</h6>
							<input required type="email" ng-pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9_-]+\.[a-zA-Z0-9]{2,6}$/" class="browser-default mg-height-45 mg-width-100-perc" required ng-maxlength="50" name="subscriber_fullname" ng-model="homectrl.quote.quote_subscriber_email">
						</div>

				        <!-- Subscriber tel-->
						<div class="col s12 input-field">
							<h6 class="bold mg_prim_color">Numéro de téléphone</h6>
							<input required name="phone" type="tel" class="browser-default mg-height-45 mg-width-100-perc" ng-pattern="/^[0-9]{8}$/" ng-minlength="8" ng-maxlength="8" name="subscriber_tel" placeholder="07070707" ng-model="homectrl.quote.quote_subscriber_tel">
						</div>

						<!-- Cotation pour le compte d'une entreprise -->
					  <div class="switch center mg-margin-top-20">
					    <h6 class="bold mg_prim_color">Cotation Entreprise</h6>
					    <label class="bold grey-text">
					      Non
					      <input type="checkbox" ng-model="homectrl.quote.quote_is_enterprise">
					      <span class="lever orange"></span>
					      Oui
					    </label>
					  </div>

						<!-- Submit -->
						<button ng-disabled="quote_ask_form.$invalid" class="mg-margin-top-20 mg-margin-bottom-20 btn mg_prim_background white-text bold mg-width-100-perc" type="submit">Envoyer</button>

						<a class="mg-margin-bottom-20 btn orange white-text bold mg-width-100-perc" ng-click="homectrl.closeModalQuote()">Annuler</a>
			
	         </form>
				

			</div>
		</div>



    </div>
</div>
