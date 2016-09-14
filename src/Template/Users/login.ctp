
<div id="login" class="col-lg-7 col-lg-offset-5  col-xs-12">
<?= $this->Form->create();?>
<div class="input-group col-xs-6">
<span class="input-group-addon glyphicon glyphicon-user"></span>
<?=$this->Form->input('username',['placeholder'=>'Email', 'label'=>false,'class'=>'form-control']);?>
</span> 
</div>

<div class="input-group col-lg-6 col-xs-6">
<span class="input-group-addon glyphicon glyphicon-lock"></span>
<?=$this->Form->input('password',['placeholder'=>'Passowrd','label'=>false, 'class'=>'form-control']);?>

</div>
	<div class="input-group col-xs-6 col-lg-6 btn-group-justified">
					<input type="checkbox" name="remember" id="remember" class="form-conrol">
					<label for="remember">Remember me</label>
					<a href="" class="text-right btn-link">Forget Passowrd</a>
				</div>
				<div class="input-group">
				
<?php     echo $this->Form->button(__('Login'),['class'=>'btn btn-primary col-lg-12 pull-right']); ?>
					
				</div>
</div>


					
					
				
