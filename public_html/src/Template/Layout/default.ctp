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
        <?= $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $this->fetch('title'); ?>
        </title>
        <?= $this->Html->meta('icon'); ?>

        <?= $this->Html->css('Cake/base.css'); ?>
        <?= $this->Html->css('Cake/style.css'); ?>

        <!-- View Specific given Meta/JS/CSS -->
        <?= $this->fetch('meta'); ?>
        <?= $this->fetch('css'); ?>
        <?= $this->fetch('script'); ?>
    </head>
    <body>
        <?
            // Always render the Flashes in queue.
            $this->Flash->render();

            // Logged in
            if ($loggedIn) {
                echo $this->Element('topbar');
                echo $this->Element('sidebar');

                $sidebarOffsetClass = 'sidebar-offset';
            }
        ?>

        <div id="content" class="clearfix p-0 <?= $sidebarOffsetClass ?? ''; ?>">
            <?= $this->fetch('content'); ?>
        </div>
    </body>
</html>
