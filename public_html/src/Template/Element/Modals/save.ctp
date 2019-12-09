<?
/**
 * Dynamic Save Modal by using the Contents of an given Element (location) as Modal Body.
 * Save means:
 *   > Add
 *   > Edit
 *   > Delete
 * This Modals' functionalities are all handled by Ajax.
 *
 * @code
 * <?= $this->Element('Modals/save', [
 *     // Title that will be shown in the Modal Header
 *     'title'       => string,
 *     // Containing the location of the Element to load in the Modal Body.
 *     'formElement' => string
 * ]); ?>
 */
?>
<div id="saveModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Start: Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title"><?= ($title ?? ''); ?></h5>

                <?= $this->Form->button('<span aria-hidden="true">&times;</span>', [
                    'class'        => 'close',
                    'data-dismiss' => 'modal',
                    'aria-label'   => __('Close'),
                    // Allows HTML to be parsed in the Button Text.
                    'escape'       => false
                ]); ?>
            </div> <!-- End: Modal Header -->

            <!-- Start: Modal Body -->
            <div class="modal-body">
                <?= $this->Element($formElement); ?>
            </div>
            <!-- End: Modal Body -->

            <!-- Start: Modal Footer -->
            <div class="modal-footer justify-content-between">
                <div class="left">
                    <?= $this->Form->button(__('Delete'), [
                        'class' => 'btn btn-danger'
                    ]); ?>
                </div>

                <div class="right">
                    <?= $this->Form->button(__('Save'), [
                        'type'  => 'submit',
                        'class' => 'btn btn-success'
                    ]); ?>
                </div>
            </div>
            <!-- End: Modal Footer -->
        </div>
    </div>
</div>

<!-- Javascript -->
<?= $this->Html->script('Modals/save_modal_handler'); ?>
<script type="text/javascript">
    var handler = new SaveModalHandler();
</script>
