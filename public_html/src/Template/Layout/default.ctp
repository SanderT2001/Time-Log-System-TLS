<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php $this->assign('title', \Cake\Core\Configure::read('App.shortName')); ?>
        <?= $this->fetch('page')."&nbsp; - &nbsp;".$this->fetch('title'); ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Boostrap CSS -->
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'); ?>

    <!-- Bootstrap CSS Theme -->
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css'); ?>

    <!-- Bootstrap required jQuery libary -->
    <?= $this->Html->script('https://code.jquery.com/jquery-3.3.1.min.js'); ?>

    <!-- Boostrap Javascript -->
    <?= $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'); ?>

	<!-- Own Javascript Functions -->
	<?= $this->Html->script('functions'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
        <?= $this->Flash->render() ?>
		<?php 
		if ($this->Session->read('Auth.User'))
		{
		?>
			<div class="container-full">
				<style>
					body {
						overflow-x: hidden;						
					}

					#header {
						min-height: 10px;
					}

					#add-log-button {
						height: 40px;
					}

					#side-bar {
						position: fixed;
						height: 100%;
                        -webkit-border-radius: 0;
                        -moz-border-radius: 0;
                        border-radius: 0;
					}

                    .margin-right-5 {
                        margin-right: 5px;
                    }

                    li.active {
                        background-color: #eee;
                    }
				</style>

				<nav class="navbar navbar-default navbar-static-top pull-right col-xs-6 col-sm-9 col-md-10"  id="header">
					<div class="container-full">
						<div class="row">
							<ul class="nav">
								<li class="dropdown pull-right">
									<a class="dropdown-toggle" data-toggle= "dropdown" href= "#"><span class= "glyphicon glyphicon-user"></span><span class= "caret"></span></a>
								
									<ul class="dropdown-menu">
										<li><a href="#"><span class= "glyphicon glyphicon-list-alt"></span>&nbsp;My Profile</a></li>	
										<li><a href="#"><span class= "glyphicon glyphicon-pencil"></span>&nbsp;Edit Profile</a></li>	
									
										<li class= "divider"></li>
					
										<li><?= $this->Html->link('&nbsp;<span class= "glyphicon glyphicon-off"></span>&nbsp;Logout', ['controller'=> 'Users', 'action' => 'logout'], ['escape' => false]); ?></li>
									</ul>
								</li>
							</ul>
						</div>	
					</div>
				</nav>

				<nav class="navbar navbar-default col-xs-6 col-sm-3 col-md-2" id="side-bar">
					<div class="container-full">
						<div class="row">
							<div class= "navbar-header">
								<?= $this->Html->link('&nbsp;Time Log System - TLS', ['controller' => 'Dashboard', 'action' => 'dashboard'], ['class' => 'navbar-brand', 'escape' => false]); ?>
							</div>
						</div>
						
						<div class="row">
							<ul class="nav navbar-nav-pills navbar-nav-stacked">
<?php
            $choices = [
                'Dashboard',
                'TimeTypes',
                'Projects',
                'Clients',
                'Logs',
                'Export'
            ];
            foreach ($choices as $choice) {
                $choices[$choice]['class'] = ($choice === $this->request['controller']) ? 'active' : '';
            }

            if ($this->request['controller'] === 'Logs' && $this->request['action'] === 'exportSettings') {
                $choices['Logs']['class'] = '';
                $choices['Export']['class'] = 'active';
            }
?>
                                <li class="<?= $choices['Dashboard']['class']; ?>"><?= $this->Html->link('&nbsp;<span class="glyphicon glyphicon-home margin-right-5"></span>&nbsp;Dashboard', ['controller'=> 'Dashboard', 'action' => 'dashboard'], ['escape' => false]); ?></li>
                                <li class="<?= $choices['TimeTypes']['class']; ?>"><?= $this->Html->link('&nbsp;<span class="glyphicon glyphicon-time margin-right-5"></span>&nbsp;Time Types', ['controller' => 'TimeTypes', 'action' => 'index'], ['escape' => false]); ?></li>
                                <li class="<?= $choices['Projects']['class']; ?>"><?= $this->Html->link('&nbsp;<span class="glyphicon glyphicon-folder-open margin-right-5"></span>&nbsp;Projects', ['controller' => 'Projects', 'action' => 'index'], ['escape' => false]); ?></li>
                                <li class="<?= $choices['Clients']['class']; ?>"><?= $this->Html->link('&nbsp;<span class="glyphicon glyphicon-credit-card margin-right-5"></span>&nbsp;Clients', ['controller' => 'Clients', 'action' => 'index'], ['escape' => false]); ?></li>
                                <li class="<?= $choices['Logs']['class']; ?>"><?= $this->Html->link('&nbsp;<span class="glyphicon glyphicon-book margin-right-5"></span>&nbsp;Logbook', ['controller' => 'Logs', 'action' => 'index'], ['escape' => false]); ?></li>
                                <li class="<?= $choices['Export']['class']; ?>"><?= $this->Html->link('&nbsp;<span class="glyphicon glyphicon-export margin-right-5"></span>&nbsp;Export', ['controller' => 'Logs', 'action' => 'exportSettings'], ['escape' => false]); ?></li>
							</ul>
						</div>
					</div>
				</nav>
				
				<div class="content col-xs-6 col-xs-offset-6 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
					<div class="container-full">
                        <?= $this->fetch('content') ?>
					</div>
				</div>
			</div>
			<footer>
			</footer>
		<?php
		}
		else
		{
		?>
			<div class="container-full">
				<?= $this->fetch('content') ?>
			</div>
		<?php
		}
		?>
</body>
</html>
