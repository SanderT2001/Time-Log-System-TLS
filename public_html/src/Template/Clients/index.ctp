<!-- Card CSS -->
<?= $this->Html->css('Elements/card'); ?>

<!-- Save Modal -->
<?= $this->Element('Modals/save', [
    'title'        => __('Edit Client'),
    'formElement'  => 'Clients/save-form'
]); ?>

<!-- Content -->
<div id="clients-overview" class="col-md-12 d-flex flex-wrap">
    <?php
        foreach ($clients as $client)
        {
            echo $this->Element('card', [
                'front' => [
                    'title' => $client->full_name,
                    'text'  => $client->email
                ],
                'back' => [
                    'text'         => $client->description,
                    'callToAction' => $this->Form->button(__('Edit'), [
                        'class'       => 'btn btn-outline-secondary',
                        'data-toggle' => 'modal',
                        'data-target' => '#saveModal'
                    ])
                ]
            ]);
        }
    ?>
</div>
