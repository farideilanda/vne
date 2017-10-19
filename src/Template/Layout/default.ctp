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
        <?= $cakeDescription ?>:  Bienvenue
    </title>
    <?= $this->Html->meta('favicon.png','/img/favicon.png',['type'=>'icon']) ?>
    <meta name="google-site-verification" content="EUydKWOsmms7425l-owt0q1tqna1s5BPTvCMHq5CQ14" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet">
    
    <?= $this->fetch('meta') ?>
    <!-- Third Party dependencies -->
    <?= $this->Html->css('../bower_components/materialize/dist/css/materialize') ?>
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

     <?= $this->element('navbar') ?>
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
