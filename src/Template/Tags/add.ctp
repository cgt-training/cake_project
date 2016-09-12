<nav class="col-lg-3 col-md-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tags form col-lg-9 col-md-8 columns content input-group">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend><?= __('Add Tag') ?></legend>
        <?php
            echo $this->Form->input('title', ['class'=>'form-control', 'label'=>['text'=>__('Title'),'class'=>'col-lg-2 col-sm-2']]);
            echo $this->Form->input('bookmarks._ids', ['class'=>'form-control', 'label'=>['text'=>__('Bookmarks'), 'class'=>'col-lg-2 col-sm-2'], 'options' => $bookmarks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>