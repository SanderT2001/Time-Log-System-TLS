<!-- Card CSS -->
<?= $this->Html->css('Elements/card'); ?>

<div id="clients-overview" class="col-md-12 d-flex">
    <?php
        foreach ($clients as $client)
        {
            echo '
                <div class="card">
                    '.$this->Html->image('Elements/grey_background.jpg', [
                        'class' => 'card-img-top',
                        'alt'   => __('Time Types Logo')
                    ]).'

                    <div class="card-body">
                        <h5 class="card-title">'.$client->full_name.'</h5>
                        <p class="card-text">'.  $client->email    .'</p>
                    </div>
                </div>
            ';
        }
    ?>
</div>
