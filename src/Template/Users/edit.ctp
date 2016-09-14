<nav class="col-lg-3 col-md-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username',['label'=>['class'=>'col-xs-2']]);
            echo $this->Form->input('email',['label'=>['class'=>'col-xs-2']]);
            echo $this->Form->input('old_password', ['type'=>'password', 'label'=>['class'=>'col-xs-2']]);
            echo $this->Form->input('new_password', ['type'=>'password','label'=>['class'=>'col-xs-2']]);
            echo $this->Form->input('role', ['label'=>['class'=>'col-xs-2'],'options'=>['Admin'=>'Admin','User'=>'User']]);  

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
