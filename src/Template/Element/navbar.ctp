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

                    <a class="hvr-shrink white left mg-padding-left-5 mg-padding-right-5" style="display: inline-block;" href="https://www.facebook.com/Virtual-Network-Entreprise-123882641648070/" target="_blank">
                      <i class="ion-social-facebook small orange-text mg-margin-right-20"></i>
                    </a>
            </li>
          </ul>

        </div>
      </nav>
    </div>