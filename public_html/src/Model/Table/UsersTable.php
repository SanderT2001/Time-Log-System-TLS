<?php

namespace App\Model\Table;

use Cake\ORM\Table;
// Used for Validating Data.
use Cake\Validation\Validator;
// Used for having consistent Validation Messages.
use App\Model\Components\ValidationMessages;

/**
 * Users Table Model
 *
 * @package Cake\ORM\Table
 * @package Cake\Validation\Validator
 *
 * @extends Cake\ORM\Table
 *
 * @since   0.1 Since the beginning of this Application.
 * @version 0.1
 *
 * @author Sander Tuinstra <sandert2001@hotmail.com>
 */
class UsersTable extends Table
{
    /**
     * Public Function validationDefault
     *
     * Validates the data to save.
     *
     * @access public
     *
     * @param Cake\Validation\Validator $validator => Stores all the validation rules.
     *
     * @return Cake\Validation\Validator $validator => Returns the Validator Object with all the Validation Rules in it now.
     */
    public function validationDefault(Validator $validator)
    {
        $requiredNameFields = [
            'first_name',
            'last_name'
        ];

        foreach ($requiredNameFields as $nameField)
        {
            $validator
                ->requirePresence($nameField, 'create', ValidationMessages::getNotPresent())
                ->notEmpty($nameField, ValidationMessages::getEmpty())
                ->maxLength($nameField, 35, ValidationMessages::getMaxLength(35));
        }

        $validator
            ->maxLength('middle_name', 35, ValidationMessages::getMaxLength(35));

        $validator
            ->requirePresence('email', 'create', ValidationMessages::getNotPresent())
            ->notEmpty('email', ValidationMessages::getEmpty())
            ->email('email', ValidationMessages::getInvalidValueType('email address'))
            ->maxLength('email', 255, ValidationMessages::getMaxLength(255));

        $validator
            ->requirePresence('password', 'create', ValidationMessages::getNotPresent())
            ->notEmpty('password', ValidationMessages::getEmpty())
            ->maxLength('password', 255, ValidationMessages::getMaxLength(255));

        $validator
            ->requirePresence('confirm_password', 'create', ValidationMessages::getNotPresent())
            ->notEmpty('confirm_password', ValidationMessages::getEmpty())
            ->add('confirm_password', 'compareWith', [
                'rule' => [ 'compareWith', 'password' ],
                'message' => __('Confirm Password does not match Password value')
            ]);


        $validator
            ->dateTime('created_at');

        $validator
            ->allowEmpty('modified_at')
            ->dateTime('updated_at');

        $validator
            ->integer('active', ValidationMessages::getInvalidValueType('integer'))
            ->range('active', [ 0, 1 ], __d(ValidationMessages::TRANSLATION_DOMAIN, ValidationMessages::MSG_START_TEXT.' must contain a value of 0 or 1'));

        return $validator;
    }

    /**
     * Public Function initialize
     *
     * @access public
     *
     * Initializes the Model with the parents' configuration and its own.
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created_at' => 'new',
                    'updated_at' => 'always'
                ]
            ]
        ]);
    }
}
