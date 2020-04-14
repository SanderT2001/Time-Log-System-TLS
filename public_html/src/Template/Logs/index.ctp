<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log[]|\Cake\Collection\CollectionInterface $logs
 */
?>
<style>
    .action-buttons {
        display: flex;
    }

    .action-buttons button {
        margin-right: 5px;
    }

    textarea {
        resize: vertical;
    }

    .w-100 {
        width: 100%;
    }
</style>

<?php $this->assign('page', 'Logbook'); ?>

<div class= "container-full">
    <div class= "row">
        <div class= "col-md-12">
            <?= $this->Form->button('<span class="glyphicon glyphicon-plus"></span> Add log', [
                'escape' => false,
                'class' => 'btn btn-success w-100',
                'id' => 'add-log-button',
                'onclick' => "addData('view')"
            ]); ?>

            <table class= "table table-bordred table-striped">
                <thead>
                    <th scope= "col"><?= $this->Paginator->sort('time_type_id', 'Time Type') ?></th>
                    <? if (empty($projectId)): ?>
                    <th scope= "col"><?= $this->Paginator->sort('project_id', 'Project') ?></th>
                    <? endif; ?>
                    <th scope= "col"><?= $this->Paginator->sort('log_summary', 'Summary') ?></th>
                    <th scope= "col"><?= $this->Paginator->sort('log_description', 'Description') ?></th>
                    <!-- <th scope= "col"><?= $this->Paginator->sort('log_date', 'Date') ?></th>-->
                    <th scope= "col"><?= $this->Paginator->sort('log_start_time', 'Start time') ?></th>
                    <th scope= "col"><?= $this->Paginator->sort('log_end_time', 'End time') ?></th>
                    <th scope= "col"><?= $this->Paginator->sort('log_time_diff_min', 'Time Difference Min') ?></th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                    <?php foreach ($logs as $log): ?>
                        <tr id= <?= $log->ID ?>>
                            <td><?= $log->has('time_type') ? $log->time_type->type_name : '' ?></td>
                            <? if (empty($projectId)): ?>
                            <td><?= $log->has('project') ? $log->project->project_name : '' ?></td>
                            <? endif; ?>
                            <td><?= $log->log_summary ?></td>
                            <td class="col-md-5"><?= $log->log_description ?></td>
                            <!--<td><?= $log->log_date->i18nFormat('dd-MM-yyyy') ?></td>-->
                            <td><?= $log->log_start_time->i18nFormat('HH:mm:ss') ?></td>
                            <td><?= $log->log_end_time->i18nFormat('HH:mm:ss') ?></td>
                            <td><?= $log->log_time_diff_min ?></td>
                            <td class="action-buttons">
                                <button class= "btn btn-primary btn-xs button-enlarge" data-title="Enlarge" onclick= "enlargeButtonClick(<?= $log->ID ?>, 'view');"><span class= "glyphicon glyphicon-eye-open"></span></button>
                                <button class= "btn btn-warning btn-xs" data-title="Edit" onclick="enlargeButtonClick(<?= $log->ID ?>, 'edit');"><span class= "glyphicon glyphicon-pencil"</span></button>
                                <button class= "btn btn-danger btn-xs" data-title="Delete" onclick="deleteData(<?= $log->ID ?>);"><span class= "glyphicon glyphicon-trash"</span></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>			

            <div class= "paginator">
                <ul class= "pagination">
                    <?= $this->Paginator->first('<< ' . __('First')) ?>
                    <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Next') . ' >') ?>
                    <?= $this->Paginator->last(__('Last') . ' >>') ?>
                </ul>
                <!-- <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p> -->
            </div>
        </div>		
    </div>
</div>

<?php
// Determine selected project.
$currentProjectIndex = 0;
foreach ($projectsAsObject as $key => $project) {
    if ($project->ID == ($projectId ?? 0)) {
        foreach ($projects as $projectnameKey => $projectname) {
            if ($projectname == $project->project_name) {
                $currentProjectIndex = $projectnameKey;
            }
        }
    }
}
?>

<!-- Enlarged View of Data Modal -->
<div class= "modal fade" id= "viewDataModal" role= "dialog">
    <div class= "modal-dialog">
        <div class= "modal-content">

            <div class= "modal-header">
                <button type= "button" class= "close" data-dismiss= "modal">&times;</button>
                <h4 class= "modal-title">Enlarged data view</h4>
            </div>				

            <?= $this->Form->create() ?>
                <div class= "modal-body">
                    <div class= "form-group">
                        <?= $this->Form->control('ID', array('readonly' => 'true', 'class' => 'form-control', 'id' => 'modal-id')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Time Type', array('empty' => true, 'class' => 'form-control readonly-dropdown', 'id' => 'modal-time-type')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Project', array('empty' => true, 'class' => 'form-control readonly-dropdown', 'id' => 'modal-project')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Summary', array('class' => 'form-control readonly', 'id' => 'modal-summary')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Description', array('type' => 'textarea', 'class' => 'form-control readonly', 'id' => 'modal-description')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Date', array('class' => 'form-control readonly', 'id' => 'modal-date')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Start time', array('class' => 'form-control readonly', 'id' => 'modal-start-time')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('End time', array('class' => 'form-control readonly', 'id' => 'modal-end-time')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Time Difference in Minutes', array('readonly' => 'true', 'class' => 'form-control', 'id' => 'modal-difference-time')); ?>
                    </div>
                </div>

                <div class= "modal-footer">
                    <button type= "button" class= "btn btn-secondary" data-dismiss= "modal">Close</button>
                    <button type= "button" class= "btn btn-danger" id= "delete-data-button" onclick= "deleteData();">Delete</button>
                    <button type= "button" class= "btn btn-success" id= "edit-data-button" onclick= "editData();">Edit</button>
                </div>	
            <?= $this->Form->end() ?>
        </div>	
    </div>
</div>

<!-- Add Data Modal-->
<div class= "modal fade" id= "addDataModal" role= "dialog">
    <div class= "modal-dialog">
        <div class= "modal-content">

            <div class= "modal-header">
                <button type= "button" class= "close" data-dismiss= "modal">&times;</button>
                <h4 class= "modal-title">Add</h4>
            </div>				

            <?= $this->Form->create() ?>
                <div class= "modal-body">
                    <div class= "form-group">
                        <?= $this->Form->control('Time Type', array('empty' => true, 'class' => 'form-control', 'id' => 'add-modal-time-type')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Project', array('empty' => true, 'class' => 'form-control', 'id' => 'add-modal-project', 'value' => $currentProjectIndex)); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Summary', array('class' => 'form-control', 'required' => true, 'id' => 'add-modal-summary')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Description', array('type' => 'textarea', 'class' => 'form-control', 'required' => true, 'id' => 'add-modal-description')); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Date', array('class' => 'form-control', 'required' => true, 'id' => 'add-modal-date', 'value' => date('Y-m-d'))); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('Start time', array('class' => 'form-control', 'required' => true, 'id' => 'add-modal-start-time', 'value' => date('H:i'))); ?>
                    </div>
                    <div class= "form-group">
                        <?= $this->Form->control('End time', array('class' => 'form-control', 'required' => true, 'id' => 'add-modal-end-time', 'value' => date('H:i'))); ?>
                    </div>
                </div>

                <div class= "modal-footer">
                    <button type= "button" class= "btn btn-secondary" data-dismiss= "modal">Close</button>
                    <button type= "button" class= "btn btn-success" id= "edit-data-button" onclick= "addData('add');">Add data</button>
                </div>	
            <?= $this->Form->end() ?>
        </div>	
    </div>
</div>
