<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Logs Model
 *
 * @property \App\Model\Table\TimeTypesTable|\Cake\ORM\Association\BelongsTo $TimeTypes
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\Log get($primaryKey, $options = [])
 * @method \App\Model\Entity\Log newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Log[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Log|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Log|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Log patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Log[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Log findOrCreate($search, callable $callback = null, $options = [])
 */
class LogsTable extends Table
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

        $this->setTable('logs');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

        $this->belongsTo('TimeTypes', [
            'foreignKey' => 'time_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id'
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
            ->scalar('log_summary')
            ->maxLength('log_summary', 255)
            ->requirePresence('log_summary', 'create')
            ->notEmpty('log_summary');

        $validator
            ->scalar('log_description')
            ->maxLength('log_description', 10000)
            ->requirePresence('log_description', 'create')
            ->notEmpty('log_description');

        $validator
            ->scalar('log_retrospective')
            ->maxLength('log_retrospective', 10000)
            ->allowEmpty('log_retrospective');

        $validator
            ->date('log_date')
            ->requirePresence('log_date', 'create')
            ->notEmpty('log_date');

        $validator
            ->time('log_start_time')
            ->requirePresence('log_start_time', 'create')
            ->notEmpty('log_start_time');

        $validator
            ->time('log_end_time')
            ->requirePresence('log_end_time', 'create')
            ->notEmpty('log_end_time');

        $validator
            ->scalar('log_time_diff_min')
            ->maxLength('log_time_diff_min', 6)
            ->requirePresence('log_time_diff_min', 'create')
            ->notEmpty('log_time_diff_min');

        $validator
            ->integer('by_user')
            ->requirePresence('by_user', 'create')
            ->notEmpty('by_user');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['time_type_id'], 'TimeTypes'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
