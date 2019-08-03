<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $client->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $client->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clients form large-9 medium-8 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Edit Client') ?></legend>
        <?php
            echo $this->Form->control('client_first_name');
            echo $this->Form->control('client_middle_name');
            echo $this->Form->control('client_last_name');
            echo $this->Form->control('client_email');
            echo $this->Form->control('client_phone');
            echo $this->Form->control('client_mobile_phone');
            echo $this->Form->control('client_house_number');
            echo $this->Form->control('client_street');
            echo $this->Form->control('client_place');
            echo $this->Form->control('client_postal_code');
            echo $this->Form->control('client_country');
            echo $this->Form->control('client_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
