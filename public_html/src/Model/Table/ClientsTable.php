<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\HasMany $Projects
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('clients');
        $this->setDisplayField('client_first_name'.' '.'client_middle_name'.' '.'client_last_name');
        $this->setPrimaryKey('ID');

        $this->hasMany('Projects', [
            'foreignKey' => 'client_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('ID')
            ->allowEmpty('ID', 'create');

        $validator
            ->scalar('client_first_name')
            ->maxLength('client_first_name', 35)
            ->requirePresence('client_first_name', 'create')
            ->notEmpty('client_first_name');

        $validator
            ->scalar('client_middle_name')
            ->maxLength('client_middle_name', 35)
            ->allowEmpty('client_middle_name');

        $validator
            ->scalar('client_last_name')
            ->maxLength('client_last_name', 35)
            ->requirePresence('client_last_name', 'create')
            ->notEmpty('client_last_name');

        $validator
            ->scalar('client_email')
            ->maxLength('client_email', 255)
            ->allowEmpty('client_email');

        $validator
            ->scalar('client_phone')
            ->maxLength('client_phone', 12)
            ->allowEmpty('client_phone');

        $validator
            ->scalar('client_mobile_phone')
            ->maxLength('client_mobile_phone', 12)
            ->allowEmpty('client_mobile_phone');

        $validator
            ->scalar('client_house_number')
            ->maxLength('client_house_number', 12)
            ->allowEmpty('client_house_number');

        $validator
            ->scalar('client_street')
            ->maxLength('client_street', 100)
            ->allowEmpty('client_street');

        $validator
            ->scalar('client_place')
            ->maxLength('client_place', 100)
            ->allowEmpty('client_place');

        $validator
            ->scalar('client_postal_code')
            ->maxLength('client_postal_code', 35)
            ->allowEmpty('client_postal_code');

        $validator
            ->scalar('client_country')
            ->maxLength('client_country', 100)
            ->allowEmpty('client_country');

        $validator
            ->scalar('client_description')
            ->allowEmpty('client_description');

        $validator
            ->integer('by_user')
            ->requirePresence('by_user', 'create')
            ->notEmpty('by_user');

        return $validator;
    }
}
