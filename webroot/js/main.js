$(document).ready(function(){
        AOS.init();
        $(window).scroll(function(){
          if($(this).scrollTop() > 720 ){
            $('#navbar-container').addClass('navbar-fixed');
          } 
          else{
            $('#navbar-container').removeClass('navbar-fixed');
          }
            
        });  

        $('.fixed-action-btn').on('click', function(){
        	$('#side-nav-trigger').trigger('click');
        });

       $('.modal').modal();

});
