<!DOCTYPE html>
<html>
<head>
      <title>
          Virtual Network Entreprise : Numéro 1 Ivoirien de l'intégration informatique
      </title>
      <meta name="description" content="Le Numéro 1 Ivoirien de l'intégration de solutions informatiques afin d'optimiser et faire grimper votre business porté par plus de 10 ans d'expérience." />  
      <meta name="keywords" content="intégration de solution, intégrateur,virtual, network, virtual network, entreprise, vne, vn, ve, entreprise civ, entreprises ci, pme ci, tic ci, côte d'ivoire">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5TDHJSR');</script>
      <!-- End Google Tag Manager -->

    <?= $this->Html->charset() ?>
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
    <?= $this->Html->css('../bower_components/hover/css/hover-min') ?>
    <?= $this->Html->css('../bower_components/imagehover.css/css/imagehover.min') ?>
    <?= $this->Html->css('../bower_components/aos/dist/aos') ?>

    <?= $this->fetch('css') ?>


      <!-- Scripts -->
        <?= $this->Html->script('jquery') ?>
        <?= $this->Html->script('jquery-migrate') ?>
        <?= $this->Html->script('slick-1.6.0/slick/slick.min') ?>
        <?= $this->Html->script('../bower_components/angular/angular.min') ?>
        <?= $this->Html->script('../bower_components/materialize/dist/js/materialize.min') ?>
        <?= $this->Html->script('../bower_components/angular/angular-materialize.min') ?>
        <?= $this->Html->script('../bower_components/angular/angular-ui-router.min') ?>
        <?= $this->Html->script('../bower_components/aos/dist/aos') ?>
        <?= $this->Html->script('main') ?>  
    

</head>
<body ng-app="vne-app" ng-controller="MainCtrl as mainctrl">
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TDHJSR"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
      <?= $this->Flash->render() ?>
      <!-- navbar -->
      <?= $this->element('navbar') ?>
      <!-- main content -->
      <?= $this->fetch('content') ?>
      <!-- Footer -->
      <?= $this->element('footer')  ?>
      <!-- Social Media -->
      <?= $this->element('social') ?>



      <!-- Angular App -->
        <?= $this->Html->script('Red/app') ?>
        <?= $this->Html->script('Red/controllers') ?>
        <?= $this->Html->script('Red/services') ?>
      <!-- Additional Dependencies -->
        <?= $this->fetch('script') ?>
</body>
</html>
