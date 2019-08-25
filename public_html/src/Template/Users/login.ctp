<?= $this->Html->css('Users/login'); ?>

<div class="container-fluid p-0 d-flex justify-content-center h-100">
    <div class="login-credentials align-self-center col-sm-4 card p-0">
        <? // @TODO (Sander) Icons
        ?>
        <div class="card-header"><?= __('Login'); ?></div>

        <div class="card-body">
            <?
                echo $this->Form->create();

                    // Email
                    echo $this->Form->control('email', [
                        'type'     => 'email',
                        'required' => true
                    ]);

                    // Password
                    echo $this->Form->control(__('password'), [
                        'type'     => 'password',
                        'required' => true
                    ]);

                    // To Register / Add Page
                    echo $this->Html->link(
                        __('Register'),
                        '/users/add',
                        [
                            'class' => 'btn btn-primary float-left'
                        ]
                    );

                    // Login / Submit
                    echo $this->Form->button(__('Login'), [
                        'type'  => 'submit',
                        'class' => 'btn btn-success float-right'
                    ]);

                echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
