<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimeTypes Model
 *
 * @property \App\Model\Table\LogsTable|\Cake\ORM\Association\HasMany $Logs
 *
 * @method \App\Model\Entity\TimeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeType findOrCreate($search, callable $callback = null, $options = [])
 */
class TimeTypesTable extends Table
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

        $this->setTable('time_types');
        $this->setDisplayField('type_name');
        $this->setPrimaryKey('ID');

        $this->hasMany('Logs', [
            'foreignKey' => 'time_type_id'
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
            ->scalar('type_name')
            ->maxLength('type_name', 255)
            ->requirePresence('type_name', 'create')
            ->notEmpty('type_name');

        $validator
            ->scalar('type_description')
            ->requirePresence('type_description', 'create')
            ->notEmpty('type_description');

        $validator
            ->scalar('type_global_name')
            ->maxLength('type_global_name', 255)
            ->requirePresence('type_global_name', 'create')
            ->notEmpty('type_global_name');

        $validator
            ->integer('by_user')
            ->requirePresence('by_user', 'create')
            ->notEmpty('by_user');

        return $validator;
    }
}
