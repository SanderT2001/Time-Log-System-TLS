<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use \DateTime;

/**
 * Log Entity
 *
 * Enitity defining a Log.
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
class Log extends Entity
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
        'time_types_id',
        'project_id',
        'summary',
        'description',
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
        'time_types_id',
        'project_id',
        'summary',
        'description',
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

    /**
     * Protected Function _getTimeDiff
     *
     * Virtual Field containing the Time Difference between the \Model\Entity\Log::start_date and \Model\Entity\Log::end_date.
     *
     * @access protected
     *
     * @uses \DateTime => For calculating the Time Difference.
     *
     * @return string => Containing the Time Difference.
     */
    protected function _getTimeDiff()
    {
        if (empty($this->end_date)) {
            return '';
        }

        $start_date = new DateTime($this->start_date);
        $end_date   = new DateTime($this->end_date);

        $diff = $start_date->diff($end_date);
        return $diff->format('%H:%i');
    }
}
