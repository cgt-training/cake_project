    <?php ehoc $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
         
         echo $cakeDescription;
         $this->fetch('title');

         ?>
    </title>
    <?php

    echo $this->Html->meta('icon') ;

    echo $this->Html->css('base.css');
    echo $this->Html->css('cake.css');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
     ?>
