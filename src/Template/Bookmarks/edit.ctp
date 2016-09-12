<nav class="col-lg-3 col-md-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bookmark->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookmarks form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($bookmark) ?>
    <fieldset>
        <legend><?= __('Edit Bookmark') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['class'=>'form-control', 'label'=>['text',__('User'), 'class'=>'col-lg-2 col-sm-2'],'options' => $users]);
            echo $this->Form->input('title', ['label'=>['text',__('Title'), 'class'=>'col-lg-2 col-sm-2']]);
            echo $this->Form->input('description', ['class'=>'form-control', 'label'=>['text',__('description'), 'class'=>'col-lg-2 col-sm-2']]);
            echo $this->Form->input('url', ['class'=>'form-control',  'label'=>['text',__('url'), 'class'=>'col-lg-2 col-sm-2']]);
            echo $this->Form->input('tags._ids', ['class'=>'form-control', 'label'=>['text',__('tags'), 'class'=>'col-lg-2 col-sm-2'], 'options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
