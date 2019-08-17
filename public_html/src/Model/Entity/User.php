<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

// Used for hashing passwords.
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * Enitity defining a User.
 *
 * @package Cake\ORM\Entity
 * @package Cake\Auth\DefaultPasswordHasher
 *
 * @extends Cake\ORM\Entity
 *
 * @since   0.1 Since the beginning of this Application.
 * @version 0.1
 *
 * @author Sander Tuinstra <sandert2001@hotmail.com>
 */
class User extends Entity
{
    /**
     * @var array _fields
     *
     * @access protected
     *
     * Contains all the Fields in the Users Table.
     */
    // @TODO (Sander) Schema ophalen uit db!
    protected $_fields = [
        'ID',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'active'
    ];

    /**
     * @var array _accessible
     *
     * @access protected
     *
     * Contains all the Fields in the Users Table that may be updated.
     */
    protected $_accessible = [
        'first_name'  => true,
        'middle_name' => true,
        'last_name'   => true,
        'email'       => true,
        'password'    => true,
        'created_at'  => true,
        'updated_at'  => true,
        'active'      => true
    ];

    /**
     * @var array _hidden
     *
     * @access protected
     *
     * Contains all the Fields in the Users Table that won't be visible in the output.
     */
    protected $_hidden = [
        'password',
        'active'
    ];

    /**
     * Protected Function _setPassword
     *
     * @access protected
     *
     * Hashes an Entities Password.
     */
    protected function _setPassword(string $password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
