<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;


/**
 * Project Entity
 *
 * Enitity defining a Project.
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
class Project extends Entity
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
        'client_id',
        'name',
        'description',
        'progress',
        'start_date',
        'end_date'
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
        'client_id',
        'name',
        'description',
        'progress',
        'start_date',
        'end_date'
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
}
