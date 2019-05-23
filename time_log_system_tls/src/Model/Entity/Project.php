<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $ID
 * @property string $project_name
 * @property string $project_description
 * @property string $project_retrospective
 * @property int $client_id
 * @property string $project_progress
 * @property \Cake\I18n\FrozenDate $project_start_date
 * @property \Cake\I18n\FrozenDate $project_end_date
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Log[] $logs
 */
class Project extends Entity
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
        'project_name' => true,
        'project_description' => true,
        'project_retrospective' => true,
        'client_id' => true,
        'project_progress' => true,
        'project_start_date' => true,
        'project_end_date' => true,
        'client' => true,
        'logs' => true
    ];
}
