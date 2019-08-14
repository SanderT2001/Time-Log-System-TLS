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

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{
    private const BOOTSTRAP_VERSION = '4-3-1';
    private const JQUERY_VERSION    = '3-4-1';

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
        $this->loadHelper('Html');

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
        $this->Html->css(
            'bootstrap-'.$this::BOOTSTRAP_VERSION.'/bootstrap.css',
            [
                'block' => true
            ]
        );

        $this->Html->script(
            'bootstrap-'.$this::BOOTSTRAP_VERSION.'/bootstrap.js',
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
        $this->Html->script(
            'jquery-'.$this::JQUERY_VERSION.'/jquery.js',
            [
                'block' => true
            ]
        );
    }
}
