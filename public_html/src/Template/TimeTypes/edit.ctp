<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeType $timeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timeType->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timeType->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Time Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Logs'), ['controller' => 'Logs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Logs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timeTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($timeType) ?>
    <fieldset>
        <legend><?= __('Edit Time Type') ?></legend>
        <?php
            echo $this->Form->control('type_name');
            echo $this->Form->control('type_description');
            echo $this->Form->control('type_global_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
