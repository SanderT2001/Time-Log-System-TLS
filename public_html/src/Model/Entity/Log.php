<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity
 *
 * @property int $ID
 * @property int $time_type_id
 * @property int $project_id
 * @property string $log_summary
 * @property string $log_description
 * @property string $log_retrospective
 * @property \Cake\I18n\FrozenDate $log_date
 * @property \Cake\I18n\FrozenTime $log_start_time
 * @property \Cake\I18n\FrozenTime $log_end_time
 * @property string $log_time_diff_min
 *
 * @property \App\Model\Entity\TimeType $time_type
 * @property \App\Model\Entity\Project $project
 */
class Log extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'time_type_id' => true,
        'project_id' => true,
        'log_summary' => true,
        'log_description' => true,
        'log_retrospective' => true,
        'log_date' => true,
        'log_start_time' => true,
        'log_end_time' => true,
        'log_time_diff_min' => true,
        'time_type' => true,
        'project' => true
    ];
}
