<?php
    $this->assign('page', 'Export Settings');
?>

<style>
    .form-control {
        margin-bottom: 10px;
    }

    .w-100 {
        width: 100%;
    }
</style>

<div class= "container-full">
    <div class= "row">
        <div class= "col-md-12">
            <h2>Settings for export</h2>
            <h5>If no date is being selected for either of the field, it will be automatically set to all records. If one of the dates isn't being selected, then the empty field will be set to the date of today.</h5>
            <hr/>

            <?= $this->Form->create() ?>
                <h4><b>Create export from a Time Type</b></h4>

                <div class= "form-group">
                    <?= $this->Form->select('Export of', [
                        'all' => 'All',
                        'project' => 'Projects',
                        'time_type' => 'Time Type'
                    ], [
                        'empty' => true,
                        'class' => 'form-control',
                        'id' => 'export-field-export-of',
                        'default' => 'all'
                    ]); ?>
                    <?= $this->Form->control('Project', array('empty' => true, 'label' => 'From project', 'class' => 'form-control', 'id' => 'export-field-from')); ?>

                    <?= $this->Form->control('Start date', array('class' => 'form-control date', 'id' => 'export-field-time-type-start-date')); ?>
                    <?= $this->Form->control('End date', array('class' => 'form-control date',  'id' => 'export-field-time-type-end-date')); ?>
                </div>

                <a href= "#" onclick= "exportData('timeType')" id= "createExportLink" class="btn btn-success w-100">Create export</a>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>

<script type= "text/javascript">
$(document).ready(function()
{
    $(".date").each(function()
    {
        $(".date").attr("type", "date");
    });
});
</script>
