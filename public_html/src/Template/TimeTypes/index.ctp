<!-- Card CSS -->
<?= $this->Html->css('TimeTypes/card'); ?>

<div class="time-types-overview col-md-12">
    <?php
        foreach ($time_types as $time_type)
        {
            echo '
                <div class="card">
                    '.$this->Html->image('TimeTypes/grey_background.jpg', [
                        'class' => 'card-img-top',
                        'alt'   => __('Time Types Logo')
                    ]).'

                    <div class="card-body">
                        <h5 class="card-title">'.$time_type->name       .'</h5>
                        <p class="card-text">'.  $time_type->description.'</p>
                    </div>
                </div>
            ';
        }
    ?>
</div>
