<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $project->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logs'), ['controller' => 'Logs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Logs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project Name') ?></th>
            <td><?= h($project->project_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Description') ?></th>
            <td><?= h($project->project_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Retrospective') ?></th>
            <td><?= h($project->project_retrospective) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $project->has('client') ? $this->Html->link($project->client->ID, ['controller' => 'Clients', 'action' => 'view', $project->client->ID]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Progress') ?></th>
            <td><?= h($project->project_progress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($project->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Start Timestamp') ?></th>
            <td><?= h($project->project_start_timestamp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project End Timestamp') ?></th>
            <td><?= h($project->project_end_timestamp) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Logs') ?></h4>
        <?php if (!empty($project->logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Assignment Id') ?></th>
                <th scope="col"><?= __('Other Id') ?></th>
                <th scope="col"><?= __('Log Summary') ?></th>
                <th scope="col"><?= __('Log Description') ?></th>
                <th scope="col"><?= __('Log Retrospective') ?></th>
                <th scope="col"><?= __('Log Start Timestamp') ?></th>
                <th scope="col"><?= __('Log End Timestamp') ?></th>
                <th scope="col"><?= __('Log Time Difference') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->logs as $logs): ?>
            <tr>
                <td><?= h($logs->ID) ?></td>
                <td><?= h($logs->project_id) ?></td>
                <td><?= h($logs->assignment_id) ?></td>
                <td><?= h($logs->other_id) ?></td>
                <td><?= h($logs->log_summary) ?></td>
                <td><?= h($logs->log_description) ?></td>
                <td><?= h($logs->log_retrospective) ?></td>
                <td><?= h($logs->log_start_timestamp) ?></td>
                <td><?= h($logs->log_end_timestamp) ?></td>
                <td><?= h($logs->log_time_difference) ?></td>
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
