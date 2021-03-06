<?php $this->assign('page', 'Login'); ?>

<style type="text/css">
    .panel-default {
        margin-top: 200px;
    }

    .panel-body {
        background-color: rgb(255, 255, 255);
    }
</style>

<div class= "container">
    <div class= "row">
        <div class="col-md-5 col-md-offset-3">
            <div class= "panel panel-default">

                <div class= "panel-heading">
                    <span class= "glyphicon glyphicon-lock"></span> Login
                </div>

                <?= $this->Form->create(); ?>
                    <div class= "panel-body">
                        <div class= "form-group">
                            <?= $this->Form->control('email', array('type' => 'email', 'placeholder' => 'Enter email...', 'required' => true, 'class' => 'form-control')); ?>
                        </div>

                        <div class= "form-group">
                            <?= $this->Form->control('password', array('type' => 'password', 'placeholder' => 'Enter password...', 'required' => true, 'class' => 'form-control')); ?>
                        </div>

                        <?= $this->Form->submit('Login', array('type' => 'submit', 'class' => 'btn btn-success')); ?>
                    </div>

                    <div class= "panel-footer">
                        Not registered? <a href= "./register">Register here</a></div>
                    </div>
                <?= $this->Form->end(); ?>

            </div>
        </div>
    </div>
</div>
