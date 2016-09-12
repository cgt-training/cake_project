
    <!-- Page Content -->
    <br><br><br><br>
        <div class="row">
            <!-- Main contents will goes here -->

            <div class="form-container col-lg-6 col-lg-offset-3 col-lg-offset-3">
<?php 
		echo 	$this->Form->create()
	?>
	
	<div class="input-group col-xs-6">
<?php
		echo	$this->Form->input("name", ["type"=>"text", "placeholder"=>"Name", "class"=>"form-control", "label"=>"Name", "value"=>"Hitesh", "default"=>"guestusers"])
	?>
	</div>

	<div class="input-group col-xs-6">
<?php 
		echo    $this->Form->input("Comment", ["type"=>"textarea", "label"=>"Comment", "placeholder"=>"Type Here", "class"=>"form-control", "required"=>true]);
 ?>
 	</div>


	<div class="input-group col-xs-6">
<?php 
		echo    $this->Form->input("Modified", ["type"=>"time", "label"=>"Modifiy", "placeholder"=>"Type Here", "class"=>"form-control", "required"=>true]);
 ?>
 	</div>


	<div class="input-group col-xs-6">
<?php 
		echo    $this->Form->select("City", ["Jodhpur", "Jaiput", "Udaipur", "Ajmenr"], ["multiple"=>true, "default"=>"1", "empty"=>"(Choose Your City)","class"=>"form-control"]);
?>
 	</div>
<div class="input-group">
<?php
		echo  $this->Form->input("Public", ["type"=>"checkbox", "value"=>"Public"]),
			  $this->Form->input("Private", ["type"=>"checkbox", "value"=>"Private", "hiddenField"=>true, "text"=>"Modifiers"]),
			  $this->Form->input("Protected", ["type"=>"checkbox", "value"=>"Protected", "hiddenField"=>true, "text"=>"Modifiers"]),
			  $this->Form->input("Friend", ["type"=>"checkbox", "value"=>"Friend", "hiddenField"=>true, "text"=>"Modifiers"]);

?>
</div>

 	<div class="input-group">
<?php 
		echo	$this->Form->radio("gender",
									 [
									 	['text'=>"Male", "value"=>"M", "class"=>"form-control"],
									 	['text'=>"Female", "value"=>"F", "class"=>"form-control"]
									 ]
								),
		 		
		 		$this->Form->end();
?>
	</div>

	<div class="input-group">
	<?php

		echo $this->Form->input("Sbumit",["class"=>"btn btn-primary pull-right", "type"=>"submit"]);
	?>
  </div>
</div>

