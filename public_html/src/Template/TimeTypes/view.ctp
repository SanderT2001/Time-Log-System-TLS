<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimeType $timeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Time Type'), ['action' => 'edit', $timeType->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Time Type'), ['action' => 'delete', $timeType->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $timeType->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Time Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logs'), ['controller' => 'Logs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Logs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timeTypes view large-9 medium-8 columns content">
    <h3><?= h($timeType->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type Name') ?></th>
            <td><?= h($timeType->type_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Description') ?></th>
            <td><?= h($timeType->type_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Global Name') ?></th>
            <td><?= h($timeType->type_global_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($timeType->ID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Logs') ?></h4>
        <?php if (!empty($timeType->logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('Time Type Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Log Summary') ?></th>
                <th scope="col"><?= __('Log Description') ?></th>
                <th scope="col"><?= __('Log Retrospective') ?></th>
                <th scope="col"><?= __('Log Date') ?></th>
                <th scope="col"><?= __('Log Start Time') ?></th>
                <th scope="col"><?= __('Log End Time') ?></th>
                <th scope="col"><?= __('Log Time Diff Min') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($timeType->logs as $logs): ?>
            <tr>
                <td><?= h($logs->ID) ?></td>
                <td><?= h($logs->time_type_id) ?></td>
                <td><?= h($logs->project_id) ?></td>
                <td><?= h($logs->log_summary) ?></td>
                <td><?= h($logs->log_description) ?></td>
                <td><?= h($logs->log_retrospective) ?></td>
                <td><?= h($logs->log_date) ?></td>
                <td><?= h($logs->log_start_time) ?></td>
                <td><?= h($logs->log_end_time) ?></td>
                <td><?= h($logs->log_time_diff_min) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Logs', 'action' => 'view', $logs->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Logs', 'action' => 'edit', $logs->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Logs', 'action' => 'delete', $logs->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $logs->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
