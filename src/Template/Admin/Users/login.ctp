
<div id="login" class="col-lg-4 col-xs-5">
	<?= $this->Form->create();?>
		<div class="input-group">
			<span class="input-group-addon glyphicon glyphicon-user"></span>
			<?=$this->Form->input('Username',['placeholder'=>'Username or Email', 'label'=>false,'class'=>'form-control']);?>
		</div>

		<div class="input-group">
			<span class="input-group-addon glyphicon glyphicon-lock"></span>
			
			<?php
		 		echo $this->Form->input('password',['placeholder'=>'Passowrd','label'=>false, 'class'=>'form-control']);
		 		?>
		</div>

		<div class="input-group btn-group-justified">
			<div class="col-lg-6 col-xs-5">
				<input type="checkbox" name="remember" id="remember" class="form-conrol">
				<label for="remember">Remember me</label>
			</div>
			
			<div class="col-lg-6 text-right">
				<a href="" class="btn-link">Forget Passowrd</a>
			</div>
		</div>

		<div class="input-group col-lg-12">
			<?php
			     echo $this->Form->button(__('Login'),['class'=>'btn btn-primary col-lg-12 col-xs-12 pull-right']);
			?>
		</div>
	<?php
		echo $this->Form->end();
		?>
	
</div>
 


					
					
				
