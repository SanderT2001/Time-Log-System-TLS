<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $client->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clients view large-9 medium-8 columns content">
    <h3><?= h($client->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client First Name') ?></th>
            <td><?= h($client->client_first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Middle Name') ?></th>
            <td><?= h($client->client_middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Last Name') ?></th>
            <td><?= h($client->client_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Email') ?></th>
            <td><?= h($client->client_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Phone') ?></th>
            <td><?= h($client->client_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Mobile Phone') ?></th>
            <td><?= h($client->client_mobile_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client House Number') ?></th>
            <td><?= h($client->client_house_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Street') ?></th>
            <td><?= h($client->client_street) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Place') ?></th>
            <td><?= h($client->client_place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Postal Code') ?></th>
            <td><?= h($client->client_postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Country') ?></th>
            <td><?= h($client->client_country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Description') ?></th>
            <td><?= h($client->client_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($client->ID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($client->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('Project Name') ?></th>
                <th scope="col"><?= __('Project Description') ?></th>
                <th scope="col"><?= __('Project Retrospective') ?></th>
                <th scope="col"><?= __('Client Id') ?></th>
                <th scope="col"><?= __('Project Progress') ?></th>
                <th scope="col"><?= __('Project Start Timestamp') ?></th>
                <th scope="col"><?= __('Project End Timestamp') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($client->projects as $projects): ?>
            <tr>
                <td><?= h($projects->ID) ?></td>
                <td><?= h($projects->project_name) ?></td>
                <td><?= h($projects->project_description) ?></td>
                <td><?= h($projects->project_retrospective) ?></td>
                <td><?= h($projects->client_id) ?></td>
                <td><?= h($projects->project_progress) ?></td>
                <td><?= h($projects->project_start_timestamp) ?></td>
                <td><?= h($projects->project_end_timestamp) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
