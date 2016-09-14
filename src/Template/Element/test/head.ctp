	<meta charset="utf-8">
		<meta http-equiv="X-UA-compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>
		<?php
				isset($title)?"" : $$title="S S I M";
				echo $title;
		?></title>
		<?php
			
			echo  $this->Html->css("bootstrap.min.css");
			echo  $this->Html->css("main.css");
			echo  $this->Html->script("bootstrap-3.3.7-dist/js/jquery-1.9.1.min.js");
			echo $this->Html->script("bootstrap-3.3.7-dist/js/bootstrap.min.js");
		?>
		

		