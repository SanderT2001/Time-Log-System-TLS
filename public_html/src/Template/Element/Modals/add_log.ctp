<div id="addLogModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Start: Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title"><?= __('Add Log'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?= __('Close'); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- End: Modal Header -->

            <!-- Start: Modal Body -->
            <div class="modal-body">
                <?
                    echo $this->Form->create('log', [
                        'url' => [
                            'plugin'     => false,
                            'controller' => 'Logs',
                            'action'     => 'add'
                        ]
                    ]);

                        // Time Type
                        echo $this->Form->control(__('time_type_id'), [
                            'type'     => 'text',
                            'required' => true
                        ]);

                        // Project ID
                        echo $this->Form->control(__('project_id'), [
                            'type'     => 'text',
                            'required' => true
                        ]);

                        // Summary
                        echo $this->Form->control(__('summary'), [
                            'type'     => 'text',
                            'required' => true
                        ]);

                        // Description
                        echo $this->Form->control(__('description'), [
                            'type'     => 'text',
                            'required' => true
                        ]);

                        // Add / Submit Button
                        echo $this->Form->button(__('Add'), [
                            'type'  => 'submit',
                            'class' => 'btn btn-success float-right'
                        ]);

                    echo $this->Form->end();
                ?>
            </div>
            <!-- End: Modal Body -->

            <!-- Start: Modal Footer -->
            <div class="modal-footer">
            </div>
            <!-- End: Modal Footer -->

        </div>
    </div>
</div>
