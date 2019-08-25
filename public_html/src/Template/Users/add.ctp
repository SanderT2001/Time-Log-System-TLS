<?= $this->Html->css('Users/add'); ?>

<div class="container-fluid p-0 d-flex justify-content-center h-100">
    <div class="add-data align-self-center col-sm-4 card p-0">
        <? // @TODO (Sander) Icons
        ?>
        <div class="card-header"><?= __('Register'); ?></div>

        <div class="card-body">
            <?
                echo $this->Form->create($user);

                    // First name
                    echo $this->Form->control('first_name', [
                        'type'     => 'text',
                        'required' => true
                    ]);

                    // Middle name
                    echo $this->Form->control('middle_name', [
                        'type'     => 'text',
                        'required' => false
                    ]);

                    // Last name
                    echo $this->Form->control('last_name', [
                        'type'     => 'text',
                        'required' => true
                    ]);

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

                    // Confirm Password
                    echo $this->Form->control(__('confirm_password'), [
                        'type'     => 'password',
                        'required' => true
                    ]);

                    // Back to Login Page
                    echo $this->Html->link(
                        __('Login'),
                        '/users/login',
                        [
                            'class' => 'btn btn-primary float-left'
                        ]
                    );

                    // Register / Submit
                    echo $this->Form->button(__('Register'), [
                        'type'  => 'submit',
                        'class' => 'btn btn-success float-right'
                    ]);

                echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
