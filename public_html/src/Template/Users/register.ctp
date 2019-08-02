<?php $this->assign('page', 'Register'); ?>

<style type="text/css">
    .panel-default {
        margin-left: 50px;
        margin-top: 150px;
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
                    <span class= "glyphicon glyphicon-lock"></span> Register
                </div>

                <?= $this->Form->create(); ?>
                    <div class= "panel-body">
                        <div class= "form-group">
                            <?= $this->Form->control('first_name', array('type' => 'text', 'placeholder' => 'Enter first name...', 'required' => true, 'class' => 'form-control')); ?>
                        </div>

                        <div class= "form-group">
                            <?= $this->Form->control('middle_name', array('type' => 'text', 'placeholder' => 'Enter middle name...', 'class' => 'form-control')); ?>
                        </div>

                        <div class= "form-group">
                            <?= $this->Form->control('last_name', array('type' => 'text', 'placeholder' => 'Enter last name...', 'required' => true, 'class' => 'form-control')); ?>
                        </div>

                        <div class= "form-group">
                            <?= $this->Form->control('email', array('type' => 'email', 'placeholder' => 'Enter email...', 'required' => true, 'class' => 'form-control')); ?>
                        </div>

                        <div class= "form-group">
                            <?= $this->Form->control('password', array('type' => 'password', 'placeholder' => 'Enter password...', 'required' => true, 'class' => 'form-control')); ?>
                        </div>

                        <?= $this->Form->submit('Register', array('action' => 'register', 'type' => 'submit', 'class' => 'btn btn-success')); ?>
                    </div>

                    <div class= "panel-footer">
                        Already registered? <a href= "./login">Login here</a></div>
                    </div>
                <?= $this->Form->end(); ?>

            </div>
        </div>
    </div>
</div>
