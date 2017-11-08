<div id="message-robot" ng-controller="HomeCtrl as homectrl" class="fixed-block hvr-bob pointer modal-trigger" style='bottom:-3%;' data-target="message_modal">
	<?= $this->Html->image('assets/robot/message_front_robot.png',['alt'=>'vne message robot','width'=>'150px']) ?>
</div>

  <!-- Modal Structure -->
  <div id="message_modal" class="modal bottom-sheet" ng-controller="HomeCtrl as homectrl">
    <div class="modal-content">
        <h3 class="bold mg_prim_color mg-size-18">Poster un message</h3>
    	<form name="quick_message_form" ng-submit="homectrl.submit_message(homectrl.message)">
    		<div class="row">
	    		<div class="col s12 input-field mg-padding-left-0">
			          <input style="background: #f5eed4;border:none !important;" ng-pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-z]{2,8}$/" ng-model="homectrl.message.email" id="email_message" required type="email" class="validate required">
			          <label for="email_message" class="bold">Email</label>
	    		</div>
	    		<div class="col s12 input-field mg-padding-left-0">
	    			  <textarea style="background:#f5eed4;" ng-model="homectrl.message.message" id="textarea1" required class="materialize-textarea required" data-length="200"></textarea>
          			  <label for="textarea1" class="bold">Message</label>
	    		</div>
	    		      <button ng-disabled="quick_message_form.$invalid || homectrl.submit_message_loading" type="submit" class="bold orange white-text btn">Poster</button>
    		</div>
    	</form>
    </div>
  </div>
