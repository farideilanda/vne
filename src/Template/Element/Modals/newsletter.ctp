<!-- Modal Trigger -->
<div class="col hide">
    <a class='btn' data-target='newsletterModal' dismissible="true" open="$root.openNewsletterModal" modal>Show Modal</a>
</div>
<!-- Modal Structure -->
<div id="newsletterModal" class="modal" >
    <div class="modal-content mg-padding-0">
		<div class="row mg-margin-0">
			<div class="col l6 m12 s12 hide-on-med-and-down mg-padding-0 orange">
				<?= $this->Html->image('assets/modals/newsletter/1.png',['style'=>'display:block;width:100%']) ?>
			</div>
			<div class="col l6 m12 s12 center" style="background:url('/img/assets/modals/newsletter/2.png');">
				<h5 class="uppercase mg_prim_color mg-padding-top-15 bold" style="clear:both;">Bienvenue à VNE</h5>
				<?= $this->Html->image('assets/home/robot.png',['class'=>'mg-width-40']) ?>
				<h6 class="uppercase mg_prim_color mg-padding-top-0 bold" style="clear:both;">Inscrivez-vous à la newsletter</h6>
				<h6 class="mg-padding-left-23 mg-padding-right-23 mg_prim_color mg-padding-top-0 mg-regular" style="clear:both;">Et recevez nos dernières offres de solutions innovantes.</h6>

               <form class="mg-margin-top-30" name="newsletter_subscription" ng-submit="mainctrl.newsletter(newsletter)">
                <div class="col l12 s12 m12 mg-margin-top-0 input-field contrast-input mg-padding-0 mg-padding-left-0">
                      <input type="email" required placeholder="E-Mail" ng-model="newsletter.newsletter_email" ng-pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-z]{2,8}$/">
                </div>
                <div class="col l12 s12 m12 mg-margin-top-0 mg-margin-bottom-25 mg-padding-0">
                     <button type="submit" ng-disabled="newsletter_subscription.$invalid || mainctrl.is_newsletter_subscribing" class="btn mg-height-49 orange white-text mg-padding-top-5 bold mg-width-100-perc">Je m'inscris</a>
                </div>
              </form>

			</div>
		</div>
    </div>
</div>