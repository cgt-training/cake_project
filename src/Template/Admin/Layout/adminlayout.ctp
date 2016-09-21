<!DOCTYPE html>
<html lang="en">
	<head>
	
	<?php
		echo $this->element('test/head',['title'=>'Users :: Index']);
	?>
	</head>
	<body>

		<!--Top heading having logo brand-name and search bar-->
		<?php echo $this->element('test/header'); ?>
<!--menu & header ends here -->				

			<div class="container">
				<div class="row col-padding">
				<?= $this->Flash->render() ;
				
		 echo $this->fetch('content'); ?>
			</div>
			</div>

		<?php echo $this->element('test/footer')?>
	</body>
</html>