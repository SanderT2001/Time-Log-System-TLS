<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\LogsTable|\Cake\ORM\Association\HasMany $Logs
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('project_name');
        $this->setPrimaryKey('ID');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id'
        ]);
        $this->hasMany('Logs', [
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
            ->scalar('project_name')
            ->maxLength('project_name', 255)
            ->requirePresence('project_name', 'create')
            ->notEmpty('project_name');

        $validator
            ->scalar('project_description')
            ->requirePresence('project_description', 'create')
            ->notEmpty('project_description');

        $validator
            ->scalar('project_retrospective')
            ->allowEmpty('project_retrospective');

        $validator
            ->scalar('project_progress')
            ->allowEmpty('project_progress');

        $validator
            ->date('project_start_date')
            ->allowEmpty('project_start_date');

        $validator
            ->date('project_end_date')
            ->allowEmpty('project_end_date');

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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));

        return $rules;
    }
}
