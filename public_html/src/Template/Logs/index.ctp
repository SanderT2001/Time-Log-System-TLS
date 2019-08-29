<?
    // Load the CSS
    echo $this->Html->css('Logs/index');

    // Load the Add Log Modal
    echo $this->Element('Modals/add_log');
?>

<div id="logs-overview" class="col-md-12">
    <button id="add-log-button" class="btn btn-success float-right" data-toggle="modal" data-target="#addLogModal"><?= __('Add'); ?></button>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <?= $this->Html->tableHeaders([
                        __('Time Type'),
                        __('Project'),
                        __('Summary'),
                        __('Start'),
                        __('End'),
                        __('Diff')
                    ]);
                ?>
            </thead>

            <tbody>
                <?php
                    foreach ($logs as $log)
                    {
                        echo '
                            <tr>
                                <th>'.$log->time_type->name.'</th>
                                <th>'.$log->project->name  .'</th>
                                <th>'.$log->summary        .'</th>
                                <th>'.$log->start_date     .'</th>
                                <th>'.$log->end_date       .'</th>
                                <th>'.$log->time_diff      .'</th>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
