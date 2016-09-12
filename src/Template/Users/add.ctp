<nav class="col-lg-3 col-md-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('email', ['class'=>'form-control', 'label'=>['text'=>__('Email'),'class'=>'col-lg-2 col-sm-2'], "class"=>"input-control"]);
            echo $this->Form->input('password', ['class'=>'form-control', 'label'=>['text'=>__('Password'),'class'=>'col-lg-2 col-sm-2'], "class"=>"input-control"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
