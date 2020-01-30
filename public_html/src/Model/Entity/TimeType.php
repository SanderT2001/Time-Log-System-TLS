<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimeType Entity
 *
 * @property int $ID
 * @property string $type_name
 * @property string $type_description
 * @property string $type_global_name
 *
 * @property \App\Model\Entity\Log[] $logs
 */
class TimeType extends Entity
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
        'type_name' => true,
        'type_description' => true,
        'type_global_name' => true,
        'by_user' => true,
        'logs' => true
    ];
}
