<style>
.top-modal{
    top:2% !important;
}
</style>
<!-- Modal Trigger -->
<div class="col hide">
    <a class='btn' data-target='worshop_modal' ready="mainctrl.ready_workshop_modal(modal)" open="mainctrl.openWorshopModal" modal>Show Modal</a>
</div>
<!-- Modal Structure -->
<div id="worshop_modal" class="modal top-modal large_ads_modal" style="min-height: 95% !important;">
    <div class="modal-content white mg-padding-left-0 mg-padding-right-0 mg-padding-top-5" style="background:url('/img/assets/robot/poster_tonio_transparent.png') no-repeat 100% -10%;">
        <section>
            <?= $this->Html->image('assets/vne-logo.png',['width'=>'165px','alt'=>'vne logo','title'=>'vne logo officiel','class'=>'mg-padding-left-24']) ?>
            <i class="ion-close-circled right small orange-text text-lighten-4 pointer" ng-click="mainctrl.openWorshopModal = false"></i>
           <h1 class="white-text mg-size-25 mg-margin-bottom-0 mg-padding-top-10 mg-margin-top-5 mg-padding-left-24 orange mg-padding-bottom-10 mg-padding-right-24">Atelier de présentation</h1>

           <h2 class="mg-size-22 bold mg_prim_color mg-padding-left-24 mg-padding-right-24 mg-padding-top-20" ng-bind="mainctrl.poster.workshop_theme">Atelier de présentation</h2>

            <img ng-src="{{mainctrl.poster.workshop_visual_path}}" alt="atelier vne" title="affiche atelier vne" width="100%">
            
            <h4 class="mg-size-15 bold mg-margin-top-15 orange-text mg-padding-left-24 mg-padding-right-24">{{mainctrl.poster.workshop_begin | date:'dd '}} {{mainctrl.poster.ref_month_full}} {{mainctrl.poster.workshop_begin | date:'yyyy - HH:mm'}} - au sein de Virtual Network Entreprise</h4>

                <h3 class="worshop-modal-description mg-size-15 bold mg-padding-right-24 mg-padding-left-24" ng-bind="mainctrl.poster.workshop_short_description">
                    Description de l'atelier
                </h3>

                <button class="waves-effect mg-margin-left-24 btn btn-primary orange mg-padding-right-24"><a class="white-text bold" href="{{mainctrl.poster.workshop_form_link}}" target="_blank">Participer Gratuitement</a></button>

                <h4 class="mg-size-10 bold mg-margin-top-15 mg_prim_color mg-padding-left-24 mg-padding-right-24">pour plus d'information, contactez-nous aux +225 22 48 88 88/48 21 94 94</h4>
                
                <p class="mg-padding-left-24 mg-padding-right-24 social-modal-icons mg-margin-bottom-10">
                    <a href="https://www.facebook.com/Virtual-Network-Entreprise-123882641648070/">
                        <?= $this->Html->image('assets/social_icons/facebook.png',['width'=>'30px']) ?>
                </a>
                <a href="https://twitter.com/VNEntreprise">
                    <?= $this->Html->image('assets/social_icons/twitter.png',['width'=>'30px']) ?>
                </a>
                <a href="https://www.linkedin.com/company/11309570/">
                    <?= $this->Html->image('assets/social_icons/linkedin.png',['width'=>'30px']) ?>
                </a>
            </p>
            <!-- Messenger us -->
            <div style="padding-left: 24px; padding-right:24px;" class="fb-messengermessageus" 
              messenger_app_id="226936691173564" 
              page_id="123882641648070" 
              color="white" 
              size="large">
            </div>
            <!-- Tweet about -->
            <a data-size="large" class="twitter-share-button" 
              href="https://twitter.com/intent/tweet?in-reply-to=933767302138515456">
            Retweet</a>

            <h4 class="mg-size-10 bold mg-margin-top-15 mg_prim_color mg-padding-left-24 mg-padding-right-24">Virtual Network Entreprise, Numéro 1 de l'intégration informatique ivoirien</h4>
        </section>
    </div>
</div>