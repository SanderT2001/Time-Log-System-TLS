<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;


/**
 * Client Entity
 *
 * Enitity defining a Client.
 *
 * @package Cake\ORM\Entity
 *
 * @extends Cake\ORM\Entity
 *
 * @since   0.1 Since the beginning of this Application.
 * @version 0.1
 *
 * @author Sander Tuinstra <sandert2001@hotmail.com>
 */
class Client extends Entity
{
    /**
     * @var array _fields
     *
     * @access protected
     *
     * Contains all the Fields in the Table.
     */
    protected $_fields = [
        'ID',
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'description'
    ];

    /**
     * @var array _accessible
     *
     * @access protected
     *
     * Contains all the Fields in the Table that may be updated.
     */
    protected $_accessible = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'description'
    ];

    /**
     * @var array _hidden
     *
     * @access protected
     *
     * Contains all the Fields in the Table that won't be visible in the output.
     */
    protected $_hidden = [
        'user_id'
    ];

    /**
     * Protected Function _getFullName()
     *
     * Virtual Field containing the Fullname of the Client.
     *
     * @access protected
     *
     * @return string => Containing the Fullname of the Client.
     */
    protected function _getFullName()
    {
        $middle_name = '';
        if (!empty($this->middle_name)) {
            $middle_name = $this->middle_name.' ';
        }
        return $this->first_name.' '.$middle_name.$this->last_name;
    }
}
