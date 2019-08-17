<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;
use Cake\Core\Configure;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{
    public  $helpers = [ 'Form', 'Html' ];
    private $useMinified = true;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        // Use the minified assets if in production.
        $this->useMinified = !Configure::read('debug');

        /**
         * Bootstrap & Jquery will be loaded with block set to true, because these are items that will always be needed.
         */
        // Set the Bootstrap CSS & JS.
        $this->setBootstrap();

        // Set jQuery
        $this->setJquery();
    }

    /**
     * Set the Boostrap CSS & JS for the Views.
     */
    private function setBootstrap()
    {
        $bootstrapVersion = Configure::readOrFail('WebrootAssetVersions.bootstrap');
        $baseFilename = 'bootstrap';
        if ($this->useMinified) {
            $baseFilename .= '.min';
        }

        $this->Html->css(
            'bootstrap-'.$bootstrapVersion.DS.$baseFilename.'.css',
            [
                'block' => true
            ]
        );

        $this->Html->script(
            'bootstrap-'.$bootstrapVersion.DS.$baseFilename.'.js',
            [
                'block' => true
            ]
        );
    }

    /**
     * Set the jQuery JS for the Views.
     */
    private function setJquery()
    {
        $jqueryVersion = Configure::readOrFail('WebrootAssetVersions.jquery');
        $baseFilename = 'jquery';
        if ($this->useMinified) {
            $baseFilename .= '.min';
        }

        $this->Html->script(
            'jquery-'.$jqueryVersion.DS.$baseFilename.'.js',
            [
                'block' => true
            ]
        );
    }
}
