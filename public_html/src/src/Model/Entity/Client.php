<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $ID
 * @property string $client_first_name
 * @property string $client_middle_name
 * @property string $client_last_name
 * @property string $client_email
 * @property string $client_phone
 * @property string $client_mobile_phone
 * @property string $client_house_number
 * @property string $client_street
 * @property string $client_place
 * @property string $client_postal_code
 * @property string $client_country
 * @property string $client_description
 *
 * @property \App\Model\Entity\Assignment[] $assignments
 * @property \App\Model\Entity\Other[] $others
 * @property \App\Model\Entity\Project[] $projects
 */
class Client extends Entity
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
        'client_first_name' => true,
        'client_middle_name' => true,
        'client_last_name' => true,
        'client_email' => true,
        'client_phone' => true,
        'client_mobile_phone' => true,
        'client_house_number' => true,
        'client_street' => true,
        'client_place' => true,
        'client_postal_code' => true,
        'client_country' => true,
        'client_description' => true,
        'assignments' => true,
        'others' => true,
        'projects' => true
    ];
}
