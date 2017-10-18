<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Virtual Network Entreprise';
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108306620-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-108306620-1');
    </script>


      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5TDHJSR');</script>
      <!-- End Google Tag Manager -->

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $title ?>
    </title>
    <?= $this->Html->meta('favicon.png','/img/favicon.png',['type'=>'icon']) ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet">
    
    <?= $this->fetch('meta') ?>
    <!-- Third Party dependencies -->
    <?= $this->Html->css('../bower_components/materialize/dist/css/materialize.min') ?>
    <!-- Custom Css goes here -->
    <?= $this->Html->css('main') ?>
    <?= $this->Html->css('../js/slick-1.6.0/slick/slick') ?>
    <?= $this->Html->css('../js/slick-1.6.0/slick/slick-theme') ?>
    <?= $this->Html->css('ionicons-2.0.1/css/ionicons.min') ?>
    <?= $this->Html->css('animatism') ?>
    <?= $this->Html->css('../bower_components/hover/css/hover-min') ?>
    <?= $this->Html->css('../bower_components/imagehover.css/css/imagehover.min') ?>
    <?= $this->Html->css('../js/prezento-master/jquery.prezento') ?>
    <?= $this->Html->css('../bower_components/aos/dist/aos') ?>

    <?= $this->fetch('css') ?>

    <base href="/">
</head>
<body ng-app="vne-app" ng-controller="MainCtrl as mainctrl">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TDHJSR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

   <?= $this->Flash->render() ?>

   <!-- Navbar -->
    <div id="navbar-container">
      <nav class="white none-box-shadow">
        <div class="nav-wrapper">
           <a href="#" class="brand-logo mg-padding-left-50 hide-on-med-and-down"> <?= $this->Html->image('assets/vne-logo.jpg',['style'=>'width:135px;']) ?></a>

            <a href="#" class="brand-logo hide-on-large-only"> <?= $this->Html->image('assets/vne-logo.jpg',['style'=>'width:115px;']) ?></a>

            <div class="fixed-action-btn hide-on-med-and-up">
              <a class="btn-floating btn-large orange">
                <i class="ion-android-menu small white-text mg-size-35"></i>
              </a>
            </div>

           <a href="#" id="side-nav-trigger" data-activates="slide-out" class="button-collapse hide-on-small-only" data-sidenav="left" data-closeonclick="true"><i class="ion-android-menu small mg_prim_color mg-size-32"></i></a>

          <!-- navbar for wider-screen -->
          <ul id="nav-mobile" class="hide-on-med-and-down right">
            <li><a href="#bienvenue" class="mg_prim_color bold wide-navigation-menu">Bienvenue</a></li>
            <li><a href="#prestations" class="mg_prim_color bold wide-navigation-menu">Prestations</a></li>
            <li><a href="#solutions" class="mg_prim_color bold wide-navigation-menu">Solutions</a></li>
            <li><a href="#trainings" class="mg_prim_color bold wide-navigation-menu">Formations</a></li>
            <li><a href="#workshops" class="mg_prim_color bold wide-navigation-menu">Ateliers</a></li>
            <li><a href="#contact" class="mg_prim_color bold wide-navigation-menu">Contact</a></li>
            <li>
                <a style="border:2px solid orange;" class="bold btn orange white-text" modal data-target="quoteModal" dismissible="false">Cotation</a>
            </li>
          </ul>
          <!-- SideNav -->
          <ul id="slide-out" class="side-nav" style="background:url('/img/assets/home/back-tech-6.png') #fff 100% 500px no-repeat;">
            <li class="center white">
              <a href="#" class="white"> <?= $this->Html->image('assets/vne-logo.jpg',['style'=>'width:150px;display:block;margin-left:10%;','class'=>'center white']) ?></a>
            </li>
            <li class="mg-margin-top-60 white"><a href="#bienvenue" class="mg_prim_color bold wide-navigation-menu">Bienvenue</a></li>
            <li class="white"><a href="#prestations" class="mg_prim_color bold wide-navigation-menu">Prestations</a></li>
            <li class="white hide-on-med-and-down"><a href="#solutions" class="mg_prim_color bold wide-navigation-menu">Solutions</a></li>
            <li class="white hide-on-med-and-down"><a href="#trainings" class="mg_prim_color bold wide-navigation-menu">Formations</a></li>
            <li class="white"><a href="#workshops" class="mg_prim_color bold wide-navigation-menu">Ateliers</a></li>
            <li class="white"><a href="#contact" class="mg_prim_color bold wide-navigation-menu">Contact</a></li>
            <li class="white">
                <a class="mg_prim_color bold wide-navigation-menu" modal data-target="quoteModal" dismissible="false">Cotation</a>
            </li>
            <li class="mg-height-48">
                    <a class="hvr-shrink white left mg-padding-left-30 mg-padding-right-5" style="display: inline-block;" href="https://www.linkedin.com/company/11309570/" target="_blank">
                      <i class="ion-social-linkedin small orange-text mg-margin-right-20"></i>
                    </a>
                    <a class="hvr-shrink white left mg-padding-left-5 mg-padding-right-5" style="display: inline-block;" href="https://twitter.com/VNEntreprise" target="_blank">
                      <i class="ion-social-twitter small orange-text mg-margin-right-20"></i>
                    </a>
                      <a class="hvr-shrink white left mg-padding-left-5 mg-padding-right-5" style="display: inline-block;" href="#!" target="_blank">
                    <i class="ion-social-skype small orange-text tooltipped hvr-shrink" data-tooltip="vne.business" data-position="top" data-delay="5s"></i>
                  </a>
            </li>
          </ul>

        </div>
      </nav>
    </div>

     <!-- Ui-Views -->
     <div ng-hide="$root.preloader" ui-view></div>
     <div ng-hide="$root.preloader" ui-view="footer"></div> 
      

      <!-- Social Media -->
      <?= $this->element('social') ?>

      <!-- Scripts -->
      <?= $this->Html->script('jquery') ?>
      <?= $this->Html->script('jquery-migrate') ?>
      <?= $this->Html->script('slick-1.6.0/slick/slick.min') ?>
      <?= $this->Html->script('../bower_components/angular/angular.min') ?>
      <?= $this->Html->script('../bower_components/materialize/dist/js/materialize.min') ?>

      <?= $this->Html->script('../bower_components/angular/angular-materialize.min') ?>
      <?= $this->Html->script('../bower_components/angular/angular-ui-router.min') ?>
      <?= $this->Html->script('../bower_components/aos/dist/aos') ?>

      <?= $this->Html->script('prezento-master/jquery.prezento') ?>
      <?= $this->Html->script('jquery.fittext') ?>
      <?= $this->Html->script('../node_modules/cleave.js/dist/cleave-angular.min') ?>
      <?= $this->Html->script('../node_modules/cleave.js/dist/addons/cleave-phone.fr') ?>
      <?= $this->Html->script('main') ?>
  
      <!-- Angular App -->
      <?= $this->Html->script('Red/app') ?>
      <?= $this->Html->script('Red/controllers') ?>
      <?= $this->Html->script('Red/services') ?>
      
      <!-- Additional Dependencies -->
      <?= $this->fetch('script') ?>
</body>
</html>
