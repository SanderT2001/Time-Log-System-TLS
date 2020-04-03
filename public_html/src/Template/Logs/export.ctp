<?php
    $this->assign('page', 'Export report');
    $totalTime = 0;
?>


<div class= "container-full">
    <div class= "row">
        <div class= "col-md-12">
            <h2>Export of Logs</h2>
            <h4>Export of user: <?= $this->Session->Read('Auth.User.first_name').' '.$this->Session->Read('Auth.User.middle_name').' '.$this->Session->Read('Auth.User.last_name') ?></h4>
            <h4>Date & Time of export: <?= date("d-m-Y H:i:s") ?></h4>
            <hr/>
            <table class= "table table-bordred table-striped">
                <thead>
                    <th scope= "col">Time Type</th>
                    <th scope= "col">Project</th>
                    <th scope= "col">Summary</th>
                    <th scope= "col">Description</th>
                    <th scope= "col">Retrospective</th>
                    <th scope= "col">Date</th>
                    <th scope= "col">Start time</th>
                    <th scope= "col">End time</th>
                    <th scope= "col">Time difference in minutes</th>
                </thead>
                <tbody>
                    <?php foreach ($logs as $log): ?>
                        <tr id= <?= $log->ID ?>>
                            <td><?= $log->has('time_type') ? $log->time_type->type_name : '' ?></td>
                            <td><?= $log->has('project') ? $log->project->project_name : '' ?></td>
                            <td><?= $log->log_summary ?></td>
                            <td><?= $log->log_description ?></td>
                            <td><?= $log->log_retrospective ?></td>
                            <td><?= $log->log_date->i18nFormat('dd-MM-yyyy') ?></td>
                            <td><?= $log->log_start_time->i18nFormat('HH:mm:ss') ?></td>
                            <td><?= $log->log_end_time->i18nFormat('HH:mm:ss') ?></td>
                            <td><?= $log->log_time_diff_min ?></td>
                        </tr>
                        <?php $totalTime = $totalTime + $log->log_time_diff_min; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>		
            <hr style="height: 1px; border: none; color: #333; background-color: #333;">
            <h4 class= "col-md-offset-10" id= "totalHours">Total Hours:&nbsp;<?= (round($totalTime / 60, 1)) ?></h4>
        </div>
    </div>
</div>

<script type= "text/javascript">
$(document).ready(function() 
{
    $("#header").remove();
    $("#side-bar").remove();

    $(".content").addClass("col-xs-6").addClass("col-xs-12");
    $(".content").addClass("col-sm-9").addClass("col-sm-12");
    $(".content").removeClass("col-md-10").addClass("col-md-12");

    $(".content").addClass("col-xs-offset-0");
    $(".content").addClass("col-sm-offset-0");
    $(".content").addClass("col-md-offset-0");
});
</script>
