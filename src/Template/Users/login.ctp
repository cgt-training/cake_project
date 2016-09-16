
<div id="login" class="col-lg-8 col-lg-offset-4 col-xs-10  col-xs-offset-2">
	<?= $this->Form->create();?>
		<div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-11">
			<span class="input-group-addon glyphicon glyphicon-user"></span>
			<?=$this->Form->input('Username',['placeholder'=>'Username or Email', 'label'=>false,'class'=>'form-control']);?>
		</div>

		<div class="input-group col-lg-6  col-md-6 col-sm-6 col-xs-11">
			<span class="input-group-addon glyphicon glyphicon-lock"></span>
			
			<?php
		 		echo $this->Form->input('password',['placeholder'=>'Passowrd','label'=>false, 'class'=>'form-control']);
		 		?>
		</div>

		<div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-11 btn-group-justified">
			<div class="col-lg-3 col-xs-5">
				<input type="checkbox" name="remember" id="remember" class="form-conrol">
				<label for="remember">Remember me</label>
			</div>
			
			<div class="col-lg-3 col-xs-6 text-right">
				<a href="" class="btn-link">Forget Passowrd</a>
			</div>
		</div>

		<div class="input-group input-group col-lg-6 col-md-6 col-sm-6 col-xs-11">
			<?php
			     echo $this->Form->button(__('Login'),['class'=>'btn btn-primary col-lg-12 col-xs-12 pull-right']);
			?>
		</div>
	<?php
		echo $this->Form->end();
		?>
	
</div>
 


					
					
				
